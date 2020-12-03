<?php
/**
 * Orange Management
 *
 * PHP Version 8.0
 *
 * @package   Modules\Auditor
 * @copyright Dennis Eichhorn
 * @license   OMS License 1.0
 * @version   1.0.0
 * @link      https://orange-management.org
 */
declare(strict_types=1);

use phpOMS\Uri\UriFactory;

/**
 * @var \phpOMS\Views\View            $this
 * @var \Modules\Audit\Models\Audit[] $audits
 */
$audits = $this->getData('audits') ?? [];

$previous = empty($audits) ? '{/prefix}admin/audit/list' : '{/prefix}admin/audit/list?{?}&id=' . \reset($audits)->getId() . '&ptype=p';
$next     = empty($audits) ? '{/prefix}admin/audit/list' : '{/prefix}admin/audit/list?{?}&id=' . \end($audits)->getId() . '&ptype=n';

echo $this->getData('nav')->render(); ?>

<div class="row">
    <div class="col-xs-12">
        <div class="portlet">
            <div class="portlet-head"><?= $this->getHtml('Audits'); ?><i class="fa fa-download floatRight download btn"></i></div>
            <table class="default fixed">
                <colgroup>
                    <col style="width: 75px">
                    <col style="width: 150px">
                    <col style="width: 100px">
                    <col style="width: 75px">
                    <col>
                    <col>
                    <col>
                    <col style="width: 125px">
                    <col style="width: 75px">
                    <col style="width: 150px">
                </colgroup>
                <thead>
                <tr>
                    <td><?= $this->getHtml('ID', '0', '0'); ?>
                    <td ><?= $this->getHtml('Module'); ?>
                    <td ><?= $this->getHtml('Type'); ?>
                    <td ><?= $this->getHtml('Subtype'); ?>
                    <td ><?= $this->getHtml('Old'); ?>
                    <td ><?= $this->getHtml('New'); ?>
                    <td ><?= $this->getHtml('Content'); ?>
                    <td ><?= $this->getHtml('By'); ?>
                    <td ><?= $this->getHtml('Ref'); ?>
                    <td ><?= $this->getHtml('Date'); ?>
                <tbody>
                <?php $count = 0; foreach ($audits as $key => $audit) : ++$count;
                $url         = UriFactory::build('{/prefix}admin/audit/single?{?}&id=' . $audit->getId()); ?>
                    <tr tabindex="0" data-href="<?= $url; ?>">
                        <td><?= $audit->getId(); ?>
                        <td><?= $this->printHtml($audit->getModule()); ?>
                        <td><?= $audit->getType(); ?>
                        <td><?= $audit->getSubtype(); ?>
                        <td><?= $this->printHtml($audit->getOld()); ?>
                        <td><?= $this->printHtml($audit->getNew()); ?>
                        <td><?= $this->printHtml($audit->getContent()); ?>
                        <td><?= $this->printHtml($audit->createdBy->login); ?>
                        <td><?= $this->printHtml($audit->getRef()); ?>
                        <td><?= $audit->createdAt->format('Y-m-d H:i'); ?>
                <?php endforeach; ?>
                <?php if ($count === 0) : ?>
                    <tr><td colspan="10" class="empty"><?= $this->getHtml('Empty', '0', '0'); ?>
                <?php endif; ?>
            </table>
            <div class="portlet-foot">
                <a tabindex="0" class="button" href="<?= UriFactory::build($previous); ?>"><?= $this->getHtml('Previous', '0', '0'); ?></a>
                <a tabindex="0" class="button" href="<?= UriFactory::build($next); ?>"><?= $this->getHtml('Next', '0', '0'); ?></a>
            </div>
        </div>
    </div>
</div>
