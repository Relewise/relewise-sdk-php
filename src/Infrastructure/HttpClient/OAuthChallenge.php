<?php declare(strict_types=1);

namespace Relewise\Infrastructure\HttpClient;

/** @internal Parses Bearer challenges without treating quoted commas as separators. */
final class OAuthChallenge
{
    public static function isInvalidToken(Response $response): bool
    {
        if ($response->code !== 401)
        {
            return false;
        }
        foreach ($response->getHeaderValues('WWW-Authenticate') as $header)
        {
            // A quoted-string can contain escaped quotes and commas.
            $parts = [];
            $start = 0;
            $quoted = false;
            $escaped = false;
            for ($i = 0; $i < strlen($header); $i++)
            {
                $character = $header[$i];
                if ($escaped)
                {
                    $escaped = false;
                }
                elseif ($quoted && $character === '\\')
                {
                    $escaped = true;
                }
                elseif ($character === '"')
                {
                    $quoted = !$quoted;
                }
                elseif (!$quoted && $character === ',')
                {
                    $parts[] = trim(substr($header, $start, $i - $start));
                    $start = $i + 1;
                }
            }
            if ($quoted || $escaped)
            {
                continue;
            }
            $parts[] = trim(substr($header, $start));
            $bearer = false;
            $valid = true;
            $error = null;
            $token = '[!#$%&\x27*+.^_`|~0-9A-Za-z-]+';
            foreach ($parts as $part)
            {
                // Empty HTTP list elements do not end the current challenge.
                if ($part === '')
                {
                    continue;
                }
                $isParameter = preg_match('/^(' . $token . ')\s*=\s*(?:(' . $token . ')|"((?:[^"\\\\\r\n]|\\\\[^\r\n])*)")$/D', $part, $parameter);
                if (!$isParameter)
                {
                    $isChallenge = preg_match('/^(' . $token . ')(?:[ \t]+(.*))?$/D', $part, $challenge);
                    if (!$isChallenge)
                    {
                        $valid = false;
                        continue;
                    }
                    if ($bearer && $valid && $error === 'invalid_token')
                    {
                        return true;
                    }
                    $bearer = false;
                    $valid = true;
                    $error = null;
                    $bearer = strcasecmp($challenge[1], 'Bearer') === 0;
                    $part = $challenge[2] ?? '';
                    $isParameter = preg_match('/^(' . $token . ')\s*=\s*(?:(' . $token . ')|"((?:[^"\\\\\r\n]|\\\\[^\r\n])*)")$/D', $part, $parameter);
                }
                if ($bearer)
                {
                    if (!$isParameter)
                    {
                        $valid = false;
                    }
                    elseif (strcasecmp($parameter[1], 'error') === 0)
                    {
                        if ($error !== null)
                        {
                            $valid = false;
                        }
                        $error = ($parameter[2] ?? '') !== '' ? $parameter[2] : preg_replace('/\\\\(.)/s', '$1', $parameter[3] ?? '');
                    }
                }
            }
            if ($bearer && $valid && $error === 'invalid_token')
            {
                return true;
            }
        }
        return false;
    }
}
