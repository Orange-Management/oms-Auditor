<?php
/**
 * Orange Management
 *
 * PHP Version 8.0
 *
 * @package   tests
 * @copyright Dennis Eichhorn
 * @license   OMS License 1.0
 * @version   1.0.0
 * @link      https://orange-management.org
 */
declare(strict_types=1);

namespace Modules\Auditor\tests\Models;

use Modules\Auditor\Models\NullAudit;

/**
 * @internal
 */
final class NullAuditTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @covers Modules\Auditor\Models\NullAudit
     * @group module
     */
    public function testNull() : void
    {
        self::assertInstanceOf('\Modules\Auditor\Models\Audit', new NullAudit());
    }
}
