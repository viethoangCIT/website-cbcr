<div id="paging">
	<?php
		echo $this->Paginator->prev('‹ Trước',  array('title'=>'Trang trước'),array(), array('class' => 'disabled','tag'=>'a'));
		echo $this->Paginator->numbers();
		echo $this->Paginator->next('Sau ›',  array('title'=>'Trang sau'), null, array('class' => 'disabled','tag'=>'a'));
    ?>
</div>