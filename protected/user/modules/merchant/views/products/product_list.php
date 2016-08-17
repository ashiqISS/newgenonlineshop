<?php
//echo $data->product_name;
$id = $data->id;
?>
<tr>
    <td>

        <?php
    if ($data->main_image != '' && $data->id != "") {
            $folder = Yii::app()->Upload->folderName(0, 1000, $data->id);
            echo '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->baseUrl . '/uploads/products/' . $folder . '/' . $data->id . '/' .$data->id . '.' . $data->main_image . '" />';
        }
        ?>
    </td>
    <td><?php echo $data->product_code; ?></td>
    <td><?php echo $data->product_name; ?></td>
    <td>₹ <?php echo $data->price; ?></td>
    <td><?php echo $data->description; ?></td>
    <td><?php echo CHtml::link('Edit',array("products/Edit",'product'=>$id),array('style'=>'color:#346cce')); ?></td>
    <td><?php echo CHtml::link('Delete',array("products/DeleteProduct",'product'=>$id),array('style'=>'color:#346cce')); ?></td>
    <td><?php echo CHtml::link('View',array('products/View','product'=>$id),array('style'=>'color:#346cce')); ?></td>
    
    

</tr>