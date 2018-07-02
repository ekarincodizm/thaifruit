<?php
use dosamigos\multiselect\MultiSelect;
?>
<?php echo MultiSelect::widget([
    'id'=>"multiXX",
    "options" => ['multiple'=>"multiple"], // for the actual multiselect
    'data' => [ 0 => 'super', 2 => 'natural'], // data as array
    'value' => [ 0, 2], // if preselected
    'name' => 'multti', // name for the form
    "clientOptions" =>
        [
            "includeSelectAllOption" => false,
            'numberDisplayed' => 2,
            'selectedAll'=>false,
        ],
]);?>

<?php
 $this->registerJs('
 $(function(){
      //  $("#multiXX").multi
 });
 ',static::POS_END);
?>