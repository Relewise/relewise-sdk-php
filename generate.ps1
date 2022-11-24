docker run --rm  -v C:\projects\Relewise\relewise-sdk-php:/local openapitools/openapi-generator-cli generate -i https://api.relewise.com/public/swagger.json -g php-dt -o /local/out --additional-properties=legacyDiscriminatorBehavior=False --additional-properties=phpLegacySupport=false --additional-properties=modern --additional-properties=invokerPackage='Relewise\Models' --additional-properties=variableNamingConvention='camelCase' --global-property models
#docker run --rm  -v C:\projects\Relewise\relewise-sdk-php:/local openapitools/openapi-generator-cli generate -i https://api.relewise.com/public/swagger.json -g php-lumen -o /local/src/.. --additional-properties=legacyDiscriminatorBehavior=False --additional-properties=modern --additional-properties=invokerPackage='Relewise\Models' --global-property models

# $path = './out'

Get-ChildItem $path -file -Filter *.php -Recurse | foreach{

    $CurrentFile=$_

Write-Output $CurrentFile

    #$Content=Get-Content $CurrentFile.FullName -Encoding UTF8

   # $Content=Get-Content $CurrentFile.FullName | Where { $CurrentFile -notmatch "*Articus|DTA*" }
    #$Content=Get-Content $CurrentFile.FullName | ? { $_ -notlike '*Articus*' -or $_ -notlike '*DTA\*' }

$filters = @("Articus", "DTA\\")
$Content=Get-Content $CurrentFile.FullName | Select-String -pattern $filters -notMatch


    #Get-Content $CurrentFile.FullName | Where { $CurrentFile -notmatch "Articus|DTA" } | Set-Content $CurrentFile.FullName -Encoding UTF8

    Set-Content $CurrentFile.FullName $Content -Encoding UTF8

    # if ($Content -like '*Articus\DataTransfer\PhpAttribute*')
    # {
    #     $Content.Replace('use Articus\DataTransfer\PhpAttribute as DTA;', '') | Set-Content $CurrentFile.FullName -Encoding UTF8
    # }

    # if ($Content -like '*#[DTA\*')
    # {
    #     $Content.Replace('use Articus\DataTransfer\PhpAttribute as DTA;', '') | Set-Content $CurrentFile.FullName -Encoding UTF8
    # }

}