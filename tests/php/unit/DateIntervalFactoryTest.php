<?php
namespace Relewise\Tests\Unit;

use Relewise\Factory\DateIntervalFactory;
use PHPUnit\Framework\TestCase;
use InvalidArgumentException;

class DateIntervalFactoryTest extends TestCase 
{
    public function testBasicTimeSpanWithoutDays(): void 
    {
        $interval = DateIntervalFactory::fromTimeSpanString("01:30:45");
        
        $this->assertEquals(1, $interval->h);
        $this->assertEquals(30, $interval->i);
        $this->assertEquals(45, $interval->s);
        $this->assertEquals(0, $interval->f);
    }

    public function testTimeSpanWithDays(): void 
    {
        $interval = DateIntervalFactory::fromTimeSpanString("2.03:30:45");
        
        // 2 days and 3 hours = 51 hours
        $this->assertEquals(51, $interval->h);
        $this->assertEquals(30, $interval->i);
        $this->assertEquals(45, $interval->s);
        $this->assertEquals(0, $interval->f);
    }

    public function testTimeSpanWithMicroseconds(): void 
    {
        $interval = DateIntervalFactory::fromTimeSpanString("01:30:45.1234567");
        
        $this->assertEquals(1, $interval->h);
        $this->assertEquals(30, $interval->i);
        $this->assertEquals(45, $interval->s);
        $this->assertEquals(0.123456, $interval->f); // Note: 7 digits truncated to 6
    }

    public function testTimeSpanWithShortMicroseconds(): void 
    {
        $interval = DateIntervalFactory::fromTimeSpanString("01:30:45.123");
        
        $this->assertEquals(1, $interval->h);
        $this->assertEquals(30, $interval->i);
        $this->assertEquals(45, $interval->s);
        $this->assertEquals(0.123000, $interval->f); // Padded to 6 digits
    }

    public function testZeroTimeSpan(): void 
    {
        $interval = DateIntervalFactory::fromTimeSpanString("00:00:00");
        
        $this->assertEquals(0, $interval->h);
        $this->assertEquals(0, $interval->i);
        $this->assertEquals(0, $interval->s);
        $this->assertEquals(0, $interval->f);
    }

    /**
     * @dataProvider invalidTimeSpanProvider
     */
    public function testInvalidTimeSpanThrowsException(string $invalidTimeSpan): void 
    {
        $this->expectException(InvalidArgumentException::class);
        DateIntervalFactory::fromTimeSpanString($invalidTimeSpan);
    }

    public function invalidTimeSpanProvider(): array 
    {
        return [
            'empty string' => [''],
            'invalid separators' => ['01-30-45'],
            'invalid days format' => ['1,5.01:30:45'],
        ];
    }
}
