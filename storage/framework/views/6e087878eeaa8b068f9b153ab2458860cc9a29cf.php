<?php
    if (!empty($itemValue) and !is_array($itemValue)) {
        $itemValue = json_decode($itemValue, true);
    }
?>

<div class="tab-pane mt-3 fade" id="sms_channels" role="tabpanel" aria-labelledby="sms_channels-tab">
    <div class="row">
        <div class="col-12 col-md-6">
            <form action="<?php echo e(getAdminPanelUrl()); ?>/settings/sms_channels" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="page" value="general">
                <input type="hidden" name="sms_channels" value="sms_channels">

                <div class="mb-5">
                    <h5><?php echo e(trans('update.sms_channel')); ?></h5>

                    <div class="form-group">
                        <label class="input-label"><?php echo e(trans('update.sms_sending_channel')); ?></label>
                        <select name="value[sms_sending_channel]" class="form-control">
                            <option value=""><?php echo e(trans('update.select_a_sms_channel')); ?></option>

                            <?php $__currentLoopData = \App\Mixins\Notifications\SendSMS::allChannels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $smsChannel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($smsChannel); ?>" <?php echo e((!empty($itemValue) and !empty($itemValue["sms_sending_channel"]) and $itemValue["sms_sending_channel"] == $smsChannel) ? 'selected' : ''); ?>><?php echo e(trans("update.sms_channel_{$smsChannel}")); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.check_mobile_number')); ?></h5>

                    <div class="form-group custom-switches-stacked">
                        <label class="custom-switch pl-0">
                            <input type="hidden" name="value[check_mobile_number]" value="0">
                            <input type="checkbox" name="value[check_mobile_number]" id="checkMobileNumberSwitch" value="1"
                                   <?php echo e((!empty($itemValue) and !empty($itemValue['check_mobile_number']) and $itemValue['check_mobile_number']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description mb-0 cursor-pointer"
                                   for="checkMobileNumberSwitch"><?php echo e(trans('update.check_mobile_number')); ?></label>
                        </label>
                        <div class="text-muted text-small mt-1"><?php echo e(trans('update.check_mobile_number_switch_hint')); ?></div>
                    </div>

                    <div class="js-check-mobile-number-digits-filed <?php echo e((!empty($itemValue) and !empty($itemValue['check_mobile_number']) and $itemValue['check_mobile_number']) ? '' : 'd-none'); ?>">
                        <div class="form-group">
                            <label class="input-label"><?php echo e(trans('update.number_of_digits_in_mobile_number')); ?></label>
                            <input type="number" name="value[number_of_digits_in_mobile_number]" id="number_of_digits_in_mobile_number"
                                   value="<?php echo e((!empty($itemValue) and !empty($itemValue['number_of_digits_in_mobile_number'])) ? $itemValue['number_of_digits_in_mobile_number'] : 1); ?>"
                                   class="form-control"/>
                            <p class="font-12 text-gray mt-1 mb-0"><?php echo e(trans('update.number_of_digits_in_mobile_number_input_hint')); ?></p>
                        </div>
                    </div>
                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.twilio_api_settings')); ?></h5>

                    <?php $__currentLoopData = ['twilio_sid', 'twilio_auth_token', 'twilio_number']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $twilioConf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-group">
                            <label><?php echo e(trans("update.{$twilioConf}")); ?></label>
                            <input type="text" name="value[<?php echo e($twilioConf); ?>]" value="<?php echo e((!empty($itemValue) and !empty($itemValue["{$twilioConf}"])) ? $itemValue["{$twilioConf}"] : old("{$twilioConf}")); ?>" class="form-control "/>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.kavenegar_settings')); ?></h5>

                    <?php $__currentLoopData = ['kavenegar_url', 'kavenegar_api_key', 'kavenegar_number']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kvngConf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-group">
                            <label><?php echo e(trans("update.{$kvngConf}")); ?></label>
                            <input type="text" name="value[<?php echo e($kvngConf); ?>]" value="<?php echo e((!empty($itemValue) and !empty($itemValue["{$kvngConf}"])) ? $itemValue["{$kvngConf}"] : old("{$kvngConf}")); ?>" class="form-control "/>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.msegat_settings')); ?></h5>

                    <?php $__currentLoopData = ['msegat_username', 'msegat_user_sender', 'msegat_api_key']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msegatConf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-group">
                            <label><?php echo e(trans("update.{$msegatConf}")); ?></label>
                            <input type="text" name="value[<?php echo e($msegatConf); ?>]" value="<?php echo e((!empty($itemValue) and !empty($itemValue["{$msegatConf}"])) ? $itemValue["{$msegatConf}"] : old("{$msegatConf}")); ?>" class="form-control "/>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.vonage_settings')); ?></h5>

                    <?php $__currentLoopData = ['vonage_number', 'vonage_key', 'vonage_secret', 'vonage_application_id', 'vonage_private_key']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vonageConf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-group">
                            <label><?php echo e(trans("update.{$vonageConf}")); ?></label>
                            <input type="text" name="value[<?php echo e($vonageConf); ?>]" value="<?php echo e((!empty($itemValue) and !empty($itemValue["{$vonageConf}"])) ? $itemValue["{$vonageConf}"] : old("{$vonageConf}")); ?>" class="form-control "/>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.msg91_settings')); ?></h5>

                    <?php $__currentLoopData = ['msg91_key', "msg91_flow_id"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg91Conf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-group">
                            <label><?php echo e(trans("update.{$msg91Conf}")); ?></label>
                            <input type="text" name="value[<?php echo e($msg91Conf); ?>]" value="<?php echo e((!empty($itemValue) and !empty($itemValue["{$msg91Conf}"])) ? $itemValue["{$msg91Conf}"] : old("{$msg91Conf}")); ?>" class="form-control "/>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="mb-5">
                    <h5><?php echo e(trans('update.2factor_settings')); ?></h5>

                    <?php $__currentLoopData = ['2factor_api_key']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $factorConf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-group">
                            <label><?php echo e(trans("update.{$factorConf}")); ?></label>
                            <input type="text" name="value[<?php echo e($factorConf); ?>]" value="<?php echo e((!empty($itemValue) and !empty($itemValue["{$factorConf}"])) ? $itemValue["{$factorConf}"] : old("{$factorConf}")); ?>" class="form-control "/>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <button type="submit" class="btn btn-primary"><?php echo e(trans('admin/main.save_change')); ?></button>
            </form>
        </div>
    </div>
</div>
<?php /**PATH /home/payparku/domains/vion.uz/public_html/resources/views/admin/settings/general/sms_channels.blade.php ENDPATH**/ ?>