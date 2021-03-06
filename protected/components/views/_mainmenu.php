<?php
$this->widget('zii.widgets.CMenu', array(
    'items' => array(
		array('label' => '<i class="fa fa-home"></i> <span>Beranda</span>', 'url' => array('/laporan/dashboard'), 'visible' => UserAccess::hasAccess('laporan', Yii::app()->user->id, 'read_p')),
        array('label' => '<i class="fa fa-money"></i> <span>Tagihan</span><b class="arrow icon-angle-down"></b>', 'url' => '#',
            'items' => array(
                array('label' => '<i class="fa fa-caret-right"></i> Daftar Tagihan', 'url' => array('/tagihan/view'), 'visible' => UserAccess::hasAccess('tagihan', Yii::app()->user->id, 'read_p')),
                array('label' => '<i class="fa fa-caret-right"></i> Tambah Transaksi', 'url' => array('/transaksi/create'), 'visible' => UserAccess::hasAccess('transaksi', Yii::app()->user->id, 'create_p')),
            ),
            'itemOptions' => array('class' => 'nav-parent'),
            'linkOptions' => array('class' => 'expand'),
            'visible' => UserAccess::hasAccess('tagihan', Yii::app()->user->id, 'read_p')
        ),
        array('label' => '<i class="fa fa-cutlery"></i> <span>Produk</span><b class="arrow icon-angle-down"></b>', 'url' => '#',
            'items' => array(
                array('label' => '<i class="fa fa-caret-right"></i> Daftar Produk', 'url' => array('/produk/view'), 'visible' => UserAccess::hasAccess('produk', Yii::app()->user->id, 'read_p')),
                array('label' => '<i class="fa fa-caret-right"></i> Tambah Produk', 'url' => array('/produk/create'), 'visible' => UserAccess::hasAccess('produk', Yii::app()->user->id, 'create_p')),
            ),
            'itemOptions' => array('class' => 'nav-parent'),
            'linkOptions' => array('class' => 'expand'),
            'visible' => UserAccess::hasAccess('produk', Yii::app()->user->id, 'read_p')
        ),
        array('label' => '<i class="fa fa-tags"></i> <span>' . Yii::t('order', 'Promo') . '</span><b class="arrow icon-angle-down"></b>', 'url' => '#',
            'items' => array(
                array('label' => '<i class="fa fa-caret-right"></i> Daftar Promosi', 'url' => array('/promosi/view'), 'visible' => UserAccess::hasAccess('promosi', Yii::app()->user->id, 'read_p')),
                array('label' => '<i class="fa fa-caret-right"></i> Tambah Promosi', 'url' => array('/promosi/create'), 'visible' => UserAccess::hasAccess('promosi', Yii::app()->user->id, 'create_p')),
            ),
            'itemOptions' => array('class' => 'nav-parent'),
            'linkOptions' => array('class' => 'expand'),
            'visible' => UserAccess::hasAccess('promosi', Yii::app()->user->id, 'read_p')
        ),
        array('label' => '<i class="fa fa-address-card"></i> <span>Pelanggan</span><b class="arrow icon-angle-down"></b>', 'url' => '#',
            'items' => array(
                array('label' => '<i class="fa fa-caret-right"></i> Daftar Pelanggan', 'url' => array('/pelanggan/view'), 'visible' => UserAccess::hasAccess('user', Yii::app()->user->id, 'read_p')),
                array('label' => '<i class="fa fa-caret-right"></i> Tambah Pelanggan', 'url' => array('/pelanggan/create'), 'visible' => UserAccess::hasAccess('user', Yii::app()->user->id, 'create_p')),
            ),
            'itemOptions' => array('class' => 'nav-parent'),
            'linkOptions' => array('class' => 'expand'),
            'visible' => UserAccess::hasAccess('user', Yii::app()->user->id, 'read_p')
        ),
        array('label' => '<i class="fa fa-users"></i> <span>User</span><b class="arrow icon-angle-down"></b>', 'url' => '#',
            'items' => array(
                array('label' => '<i class="fa fa-caret-right"></i> Daftar User', 'url' => array('/user/view'), 'visible' => UserAccess::hasAccess('user', Yii::app()->user->id, 'read_p')),
                array('label' => '<i class="fa fa-caret-right"></i> Tambah User', 'url' => array('/user/create'), 'visible' => UserAccess::hasAccess('user', Yii::app()->user->id, 'create_p')),
            ),
            'itemOptions' => array('class' => 'nav-parent'),
            'linkOptions' => array('class' => 'expand'),
            'visible' => UserAccess::hasAccess('user', Yii::app()->user->id, 'read_p')
        ),
        
        array('label' => '<i class="fa fa-bar-chart-o"></i> <span>Statistik</span><b class="arrow icon-angle-down"></b>', 'url' => '#',
            'items' => array(
                array('label' => '<i class="fa fa-caret-right"></i> Pendapatan', 'url' => array('/laporan/view'), 'visible' => UserAccess::hasAccess('laporan', Yii::app()->user->id, 'read_p')),
                array('label' => '<i class="fa fa-caret-right"></i> Analitik', 'url' => array('/laporan/analitik'), 'visible' => UserAccess::hasAccess('laporan', Yii::app()->user->id, 'create_p')),
            ),
            'itemOptions' => array('class' => 'nav-parent'),
            'linkOptions' => array('class' => 'expand'),
            'visible' => UserAccess::hasAccess('laporan', Yii::app()->user->id, 'read_p')
        ),
        array('label' => '<i class="fa fa-power-off"></i> <span>Logout</span>', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
    ),
    'htmlOptions' => array('class' => 'navigation'),
    'encodeLabel' => false,
    'activeCssClass' => 'active',
    'submenuHtmlOptions' => array('class' => 'children')
));
?>
