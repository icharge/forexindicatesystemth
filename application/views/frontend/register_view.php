<div class="panel-body bg-light p30">
    <div class="row">
        <div class="col-sm-7 pr30">
            <?= form_open('Auth/doregister', 'name="regform" id="regform"') ?>

            <?php if ($this->session->flashdata('msg')) { ?>
                <div class="section row">
                    <div class="col-md-12">
                        <?= $this->session->flashdata('msg') ?>
                    </div>
                </div>

            <?php } ?>
            <div class="section">
                <label for="username" class="field-label text-muted fs18 mb10">ชื่อผู้ใช้</label>
                <label for="username" class="field prepend-icon">
                    <input type="text" name="username" id="username" class="gui-input" placeholder="Enter username" autocomplete="forexuser">
                    <label for="username" class="field-icon"><i class="fa fa-user"></i>
                    </label>
                </label>
            </div>
            <!-- end section -->

            <div class="section">
                <label for="password" class="field-label text-muted fs18 mb10">Password</label>
                <label for="password" class="field prepend-icon">
                    <input type="password" name="password" id="password" class="gui-input" placeholder="Enter password" autocomplete="forexpass">
                    <label for="password" class="field-icon"><i class="fa fa-lock"></i>
                    </label>
                    <?= form_error('username', '<span class="label label-danger">', '</span>'); ?>
                </label>
            </div>
            <!-- end section -->

            <div class="section">
                <label for="name" class="field-label text-muted fs18 mb10">ชื่อ</label>
                <label for="name" class="field prepend-icon">
                    <input type="text" name="name" id="name" class="gui-input" placeholder="" autocomplete="forexname">
                    <label for="name" class="field-icon"><i class="fa fa-user"></i>
                    </label>
                </label>
            </div>

            <div class="section">
                <label for="surname" class="field-label text-muted fs18 mb10">นามสกุล</label>
                <label for="name" class="field prepend-icon">
                    <input type="text" name="surname" id="surname" class="gui-input" placeholder="" autocomplete="forexsurname">
                    <label for="surname" class="field-icon"><i class="fa fa-user"></i>
                    </label>
                </label>
            </div>

            <div class="section">
                <label for="ib" class="field-label text-muted fs18 mb10">เลขบัญชี (IB)</label>
                <label for="ib" class="field prepend-icon">
                    <input type="text" name="ib" id="surname" class="gui-input" placeholder="">
                    <label for="ib" class="field-icon"><i class="fa fa-user"></i>
                    </label>
                </label>
            </div>

            <div class="section">
                <label for="ggp" class="field-label text-muted fs18 mb10">Email ที่ใช้งาน Google Plus</label>
                <label for="ggp" class="field prepend-icon">
                    <input type="email" name="ggp" id="ggp" class="gui-input" placeholder="" autocomplete="forexggp">
                    <label for="ggp" class="field-icon"><i class="fa fa-user"></i>
                    </label>
                </label>
            </div>

            <div class="section">
                <label for="fbname" class="field-label text-muted fs18 mb10">ชื่อ Facebook</label>
                <label for="fbname" class="field prepend-icon">
                    <input type="text" name="fbname" id="fbname" class="gui-input" placeholder="" autocomplete="forexfbname">
                    <label for="fbname" class="field-icon"><i class="fa fa-user"></i>
                    </label>
                </label>
            </div>
            <?= form_close() ?>
        </div>

    </div>
</div>