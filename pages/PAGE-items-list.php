<?php
// (A) GET ITEMS
$items = $_CORE->autoCall("Items", "getAll");

// (B) DRAW ITEMS LIST
if (is_array($items)) { foreach ($items as $sku=>$i) { ?>
<div class="d-flex align-items-center border p-2">
  <div class="flex-grow-1">
    <strong>[<?=$sku?>] <?=$i["item_name"]?></strong><br>
    <small><?=$i["item_desc"]?></small><br>
    <small><?=$i["item_qty"]?> <?=$i["item_unit"]?></small>
  </div>
  <div class="dropdown">
    <button class="btn btn-primary p-3 ico-sm icon-arrow-right" type="button" data-bs-toggle="dropdown"></button>
    <ul class="dropdown-menu dropdown-menu-dark">
      <li class="dropdown-item" onclick="item.addEdit('<?=$sku?>')">
        <i class="text-secondary ico-sm icon-pencil"></i> Edit
      </li>
      <li class="dropdown-item" onclick="check.go('<?=$sku?>')">
        <i class="text-secondary ico-sm icon-history"></i> History
      </li>
      <li class="dropdown-item" onclick="item.sup('<?=$sku?>')">
        <i class="text-secondary ico-sm icon-address-book"></i> Suppliers
      </li>
      <li class="dropdown-item text-warning" onclick="item.del('<?=$sku?>')">
        <i class="ico-sm icon-bin2"></i> Delete
      </li>
    </ul>
  </div>
</div>
<?php }} else { echo "No items found."; }

// (C) PAGINATION
$_CORE->load("Page");
$_CORE->Page->draw("item.goToPage");