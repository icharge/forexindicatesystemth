<div class="panel-body bg-light p30">
    ยินดีต้อนรับคุณ <?= $memberData->name. ' ' . $memberData->surname ?><br>
    เลขบัญชี : <?= $memberData->member_ib ?><br>
    สถานะ : <?= ($isVip?'VIP':'Normal') ?><br>
    <br>
    <?php if ($isVip) { ?>
    <a href="https://www.facebook.com/groups/657855137693422/" class="btn btn-primary">เข้าสู่ห้อง VIP</a>
    <?php } ?>
</div>