<?php
/*
 |------------------------------------------------------------------------------
 | Template\Element\Table: Pager
 |------------------------------------------------------------------------------
 */

$id = isset($id) ? $id : 'table-pager';
?>

<div class="table-pager row" id="<?= $id ?>">
  
  <div class="col-sm-7">
    
    <div class="pager-summary pull-left">Showing page x of y</div>
    
    <div class="pager-limit pull-left">
      <select data-action="limit">
        <option value="10">10</option>
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="100">100</option>
      </select>
      <span>records per page</span>
    </div>
    
  </div>
  
  <nav class="pager-nav col-sm-5 text-right">
    <ul class="pagination" style="margin-bottom: 0px;">
      
      <li class="disabled">
        <a aria-label="First" data-action="first">
          <span class="fa fa-angle-double-left"></span>
        </a>
      </li>
      
      <li class="disabled">
        <a aria-label="Previous" data-action="prev">
          <span class="fa fa-angle-left"></span>
        </a>
      </li>
      
      <li>
        <a aria-label="Next" data-action="next">
          <span class="fa fa-angle-right"></span>
        </a>
      </li>
      
      <li>
        <a aria-label="Last" data-action="last">
          <span class="fa fa-angle-double-right"></span>
        </a>
      </li>
      
    </ul>
  </nav>
  
</div>