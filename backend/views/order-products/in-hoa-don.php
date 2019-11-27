<?php

use common\models\Common1;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii2assets\printthis\PrintThis;
/* @var $this yii\web\View */
/* @var $model common\models\OrderProducts */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Order Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<style>
    button#btnPrintThis {
        box-shadow: rgb(159, 180, 242) 0px 0px 0px 2px;
        background: linear-gradient(rgb(120, 146, 194) 5%, rgb(71, 110, 158) 100%) rgb(120, 146, 194);
        border-radius: 10px;
        border: 1px solid rgb(78, 96, 150);
        display: inline-block;
        cursor: pointer;
        color: rgb(255, 255, 255);
        font-family: Arial;
        font-size: 19px;
        padding: 5px 20px;
        /* text-decoration: none; */
        text-shadow: rgb(40, 57, 102) 0px 1px 0px;
    }

    div#toolbar {padding-bottom: 10px;border-bottom: 1px solid black;}
    table {
        padding-bottom: 80px !important;
        border-collapse: collapse !important;
    }

    table,
    th,
    td {
        border: 1px solid black !important;
        padding: 5px 10px !important;
    }

    table {
        width: 100% !important;
    }

    div#printArea {
        position: relative;
    }

    img {
        position: absolute;
        width: 50%;
        max-height: 200px;
        top:421px;
        opacity: 0.3;
       
        left: 25%;
    }
</style>
<?php
function ConvertNumberToWords($number)
{

    $hyphen      = ' ';
    $conjunction = '  ';
    $separator   = ' ';
    $negative    = 'âm ';
    $decimal     = ' phẩy ';
    $dictionary  = array(
        0                   => 'Không',
        1                   => 'Một',
        2                   => 'Hai',
        3                   => 'Ba',
        4                   => 'Bốn',
        5                   => 'Năm',
        6                   => 'Sáu',
        7                   => 'Bảy',
        8                   => 'Tám',
        9                   => 'Chín',
        10                  => 'Mười',
        11                  => 'Mười một',
        12                  => 'Mười hai',
        13                  => 'Mười ba',
        14                  => 'Mười bốn',
        15                  => 'Mười năm',
        16                  => 'Mười sáu',
        17                  => 'Mười bảy',
        18                  => 'Mười tám',
        19                  => 'Mười chín',
        20                  => 'Hai mươi',
        30                  => 'Ba mươi',
        40                  => 'Bốn mươi',
        50                  => 'Năm mươi',
        60                  => 'Sáu mươi',
        70                  => 'Bảy mươi',
        80                  => 'Tám mươi',
        90                  => 'Chín mươi',
        100                 => 'trăm',
        1000                => 'ngàn',
        1000000             => 'triệu',
        1000000000          => 'tỷ',
        1000000000000       => 'nghìn tỷ',
        1000000000000000    => 'ngàn triệu triệu',
        1000000000000000000 => 'tỷ tỷ'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convertNumberToWords(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convertNumberToWords($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convertNumberToWords($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convertNumberToWords($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }

    return $string;
}
?>

    <div id="toolbar">
        <?php
        echo PrintThis::widget([
            'htmlOptions' => [
                'id' => 'printArea',
                'btnClass' => 'btn btn-info',
                'btnId' => 'btnPrintThis',
                'btnText' => 'Print',
                'btnIcon' => 'fa fa-print'
            ],
            'options' => [
                'debug' => false,
                'importCSS' => true,
                'importStyle' => true,
                'loadCSS' => "/css/printreport.css",
                'pageTitle' => "",
                'removeInline' => false,
                'printDelay' => 333,
                'header' => null,
                'formValues' => true,
            ]
        ]);
        ?>
    </div>
    <div id="printArea">
        <img src="/theme/logo-v2-cl.png" alt="">
        <div class="info">
            <div class="header-print" style="text-align:center">
                <h4 style="margin: 5px 0px;">CÔNG TY CỔ PHẦN CƠ KHÍ VÀ DỊCH VỤ ĐỨC THẮNG</h4>
                <span style="color:blue;">www.mayxaydungducthang.vn</span> - <span> 0912.543.455</p>
                    <h3>HÓA ĐƠN GIÁ TRỊ GIA TĂNG</h3>
                    <i>(BẢN THỂ HIỆN HÓA ĐƠN ĐIỆN TỬ)</i>
                    <p>Ngày <?= date("d", strtotime('now')); ?> Tháng <?= date("m", strtotime('now')); ?> Năm <?= date("Y", strtotime('now')); ?></p>
            </div>


            <table class="thong-tin-chu-quan">
                <tr>
                    <td>Tên người bán</td>
                    <td>
                        <h4 style="margin: 5px 0px;">: CÔNG TY CỔ PHẦN CƠ KHÍ VÀ DỊCH VỤ ĐỨC THẮNG</h4>
                    </td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td>: 170A Thạch Bàn - Long Biên - Hà Nội</td>
                </tr>
                <tr>
                    <td>Mã số thuế</td>
                    <td>: 0108654664</td>
                </tr>

            </table>
            <br>
            <table class="thong-tin-khach-hang">
                <tr>
                    <td>Tên người mua</td>
                    <td>: <?= ucwords($model->full_name) ?></td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td>: <?= ucwords($model->address) ?></td>
                </tr>
                <tr>
                    <td>Email </td>
                    <td>: <?= ucwords($model->email) ?></td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td>: <?= '+84-' . ucwords($model->cell_phone) ?></td>
                </tr>

            </table>
            <br>
            <table class="table table-boder tableContent">
                <tr>
                    <th>STT</th>
                    <th>Tên hàng hóa, dịch vụ</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>

                <?php
                if (!empty($detaiOrders)) {
                    $i = 1;
                    foreach ($detaiOrders as $detaiOrder) { ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= ucwords($detaiOrder->products->full_name) ?></td>
                            <td style="text-align:center"><?= $detaiOrder->amount ?></td>
                            <td style="text-align:right"> <?= number_format($detaiOrder->products->price) ?></td>
                            <td style="text-align:right"><?=
                                    number_format($detaiOrder->products->price * 1)
                                ?>
                            </td>
                        </tr>
                <?php }
                }
                ?>
                <tr>
                    <td colspan="4">Tổng cộng tiền thanh toán: </td>
                    <td colspan="1" style="text-align:right" colspan="4"><?= $arayPricePro ?  number_format($arayPricePro) : 0 ?> VND</td>
                </tr>
                <tr>
                    <td colspan="4">Số tiền bẳng chữ: </td>
                    <td colspan="1" style="text-align:right" colspan="4"><?= ConvertNumberToWords($arayPricePro) ?></td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align:center;padding-bottom:50px;">
                        <b>Người mua hàng</b><br>
                        <i>(Ký, ghi rõ họ tên)</i>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </td>
                    <td colspan="2" style="text-align:center;padding-bottom:50px;">
                        <b>Người bán hàng</b><br>
                        <i>(Ký, Đóng dấu, Ghi rõ họ tên)</i>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </td>
                </tr>

            </table>
        </div>
    </div>