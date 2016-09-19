<?php
//echo $data->product_name;
$id = $data->id;
?>
<tr>
    <td>

        <?php
        if ($data->main_image != '' && $data->id != "") {
            $folder = Yii::app()->Upload->folderName(0, 1000, $data->id);
            echo '<img width="100" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->baseUrl . '/uploads/products/' . $folder . '/' . $data->id . '/small.' . $data->main_image . '" />';
        }
        ?>
    </td>
    <td><?php echo $data->product_code; ?></td>
    <td><?php echo $data->product_name; ?></td>
    <td style="width: 10%;"><?php echo Yii::app()->Currency->convert($data->price); ?></td>
    <td>
        <?php
        $servicedesc = strip_tags($data->description);
        $servicedesc = SUBSTR($servicedesc, 0, 200);
        if ((strlen($data->description)) > 200) {
            echo $servicedesc . '...';
        } else {
            echo $servicedesc;
        }
        ?>
    </td>
    <td style="text-align: center;color: #e40689 !important"> <?php
        if ($data->is_admin_approved == 1) {
            echo 'Yes';
        } else {
            echo 'No';
        }
        ?></td>
    <td>
        <div style="padding: .2em"><?php echo CHtml::link('clone', array('products/CloneProduct', 'id' => $id), array('style' => 'color:#346cce;font-size:12px')); ?></div>
        <div style="padding: .2em"><?php echo CHtml::link('Edit', array("products/Edit", 'product' => $id), array('style' => 'color:#346cce;font-size:12px')); ?></div>
        <div style="padding: .2em"><?php echo CHtml::link('Delete', array("products/DeleteProduct", 'product' => $id), array('style' => 'color:#346cce;font-size:12px')); ?></div>
        <div style="padding: .2em"><?php echo CHtml::link('View', array('products/View', 'product' => $id), array('style' => 'color:#346cce;font-size:12px')); ?></div>
    </td>



</tr>