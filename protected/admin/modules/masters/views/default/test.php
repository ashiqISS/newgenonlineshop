<?php
$url = 'http://localhost/laksya/uploads/banner/1.jpg';
$this->widget('admin.extensions.jcrop.EJcrop', array(
    //
    // Image URL
//    'url' => $this->createAbsoluteUrl('https://laksyah.com/skin/frontend/laksyah/default/images/whats-new.jpg'),
    'url' => $url,
    //
    // ALT text for the image
    'alt' => 'Crop This Image',
    //
    // options for the IMG element
    'htmlOptions' => array('id' => 'imageId'),
    //
    // Jcrop options (see Jcrop documentation)
    'options' => array(
        'minSize' => array(50, 50),
        'aspectRatio' => 1,
        'onRelease' => "js:function() {ejcrop_cancelCrop(this);}",
    ),
    // if this array is empty, buttons will not be added
    'buttons' => array(
        'start' => array(
            'label' => Yii::t('promoter', 'Adjust thumbnail cropping'),
            'htmlOptions' => array(
                'class' => 'myClass',
                'style' => 'color:red;' // make sure style ends with « ; »
            )
        ),
        'crop' => array(
            'label' => Yii::t('promoter', 'Apply cropping'),
        ),
        'cancel' => array(
            'label' => Yii::t('promoter', 'Cancel cropping')
        )
    ),
    // URL to send request to (unused if no buttons)
    'ajaxUrl' => "../default/crop?imgUrl=$url",
    //
    // Additional parameters to send to the AJAX call (unused if no buttons)
    'ajaxParams' => array('imgUrl' => $url),
));
?>

<script>
    jQuery.browser = {};
    (function () {
        jQuery.browser.msie = false;
        jQuery.browser.version = 0;
        if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
            jQuery.browser.msie = true;
            jQuery.browser.version = RegExp.$1;
        }
    })();
</script>