<?php $this->tableWidget(
			array('class'=>'features-table'),
			array(
				array('title'=>'№'),
				array('title'=>'Автор', 
					'style'=> array('class'=>'grey')),
				array('title'=>'Коментарий', 
					'style'=> array('class'=>'grey')),
				array('title'=>'Время создания', 
					'style'=> array('class'=>'green'))
			),
				$data, 
			array(
				array('dataName'=>'#'),
				array('dataName'=>'author_id',
					'style'=>array('class'=>'grey')),
				array('dataName'=>'comments',
					'style'=>array('class'=>'grey')),
				array('dataName'=>'update_time',
					'style'=>array('class'=>'green')),
			));

			/*
			$this->bootstrapTableWidget(
			array(),
			array(
				array('title'=>'№'),
				array('title'=>'Автор', 
					'style'=> array('class'=>'grey')),
				array('title'=>'Коментарий', 
					'style'=> array('class'=>'grey')),
				array('title'=>'Время создания', 
					'style'=> array('class'=>'green'))
			),
				$data, 
			array(
				array('dataName'=>'#'),
				array('dataName'=>'author_id'),
				array('dataName'=>'comments'),
				array('dataName'=>'update_time'),
			));
			*/
