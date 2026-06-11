<?php

namespace Relewise\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Relewise\Models\Campaign;
use Relewise\Models\Increase;
use Relewise\Models\ObservableVariantAttributeSelector;
use Relewise\Models\ScheduledPeriod;
use Relewise\Models\VariantChangeTriggerConfiguration;

class HydrationTests extends TestCase
{
    public function testCampaignHydratesScheduleAsScheduledPeriod(): void
    {
        $campaign = Campaign::hydrate([
            'schedule' => [
                '$type' => 'Relewise.Client.DataTypes.Scheduling.ScheduledPeriod, Relewise.Client',
                'fromUtc' => '2026-01-01T12:00:00+00:00',
                'toUtc' => '2026-01-02T12:00:00+00:00',
            ],
        ]);

        self::assertInstanceOf(ScheduledPeriod::class, $campaign->schedule);
        self::assertSame('2026-01-01T12:00:00+00:00', $campaign->schedule->fromUtc->format(DATE_ATOM));
        self::assertSame('2026-01-02T12:00:00+00:00', $campaign->schedule->toUtc->format(DATE_ATOM));
    }

    public function testVariantChangeTriggerConfigurationHydratesNestedTypes(): void
    {
        $configuration = VariantChangeTriggerConfiguration::hydrate([
            'entityPropertySelector' => [
                '$type' => 'Relewise.Client.DataTypes.EntityPropertySelectors.ObservableVariantAttributeSelector, Relewise.Client',
                'attribute' => 'SalesPrice',
            ],
            'change' => [
                '$type' => 'Relewise.Client.DataTypes.Changes.Increase, Relewise.Client',
            ],
        ]);

        self::assertInstanceOf(ObservableVariantAttributeSelector::class, $configuration->entityPropertySelector);
        /** @var ObservableVariantAttributeSelector $entityPropertySelector */
        $entityPropertySelector = $configuration->entityPropertySelector;
        self::assertSame('SalesPrice', $entityPropertySelector->attribute->value);
        self::assertInstanceOf(Increase::class, $configuration->change);
    }
}
