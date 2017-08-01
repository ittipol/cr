<div class="modal fade" id="donation_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 id="myModalLabel1" class="modal-title">วิธีการบริจาคให้กับมูลนิธิ</h4>
      </div>
      <div class="modal-body">
        <h2>1. โอนเงินมายังบัญชีธนาคาร</h2>

        <div class="tag-box tag-box-v3">

          @include('content.bank_account')

        </div>

        <h2>2. แจ้งการบริจาคของคุณ</h2>
        <h4>ในหน้ามูลนิธิคลิกที่ "บริจาคให้กับมูลนิธินี้" จะแสดงแบบฟอร์มการบริจาค กรอกรายละเอียดให้ครบถ้วนจากนั้นตลิกที่ "แจ้งการบริจาค" เมื่อแจ้งแล้วการบริจาคของคุณจะถูกตรวจสอบและดำเนินการส่งมอบให้กับมูลนิธิตามที่กำหนด</h4>
      </div>
      <div class="modal-footer">
        <button data-dismiss="modal" class="btn-u btn-u-default" type="button">ปิด</button>
      </div>
    </div>
  </div>
</div>