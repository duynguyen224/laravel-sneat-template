<?php
$INACTIVE = 'Vô hiệu hóa';
$ACTIVE = 'Hoạt động';
$DELETED = 'Đã xóa';

$WAITING = 'Đang chờ';
$PREPARING = 'Đang chuẩn bị';
$COOKING = 'Đang nấu';
$SERVED = 'Đã phục vụ';

$DRAFT = 'Bản nháp';
$PENDING = 'Chờ duyệt';
$ACCEPTED = 'Đã duyệt';
$REJECTED = 'Từ chối';

$PENDING_ORDER = 'Chờ đặt hàng';
$SHIPPING = 'Đang giao hàng';
$SHIPPED = 'Đã giao hàng';

$FINISHED = 'Đã hoàn thành';
$CANCELED = 'Đã hủy';

$EATING = 'Đang ăn';
$RESERVED = 'Đã đặt truóc';
$EMPTY = 'Trống';
?>

@switch($status)
    @case(0)
        <span class="badge bg-label-danger me-1">{{ $INACTIVE }}</span>
    @break

    @case(1)
        <span class="badge bg-label-success me-1">{{ $ACTIVE }}</span>
    @break

    @case(2)
        <span class="badge bg-label-danger me-1">{{ $DELETED }}</span>
    @break

    @case(3)
        <span class="badge bg-label-secondary me-1">{{ $WAITING }}</span>
    @break

    @case(4)
        <span class="badge bg-label-primary me-1">{{ $PREPARING }}</span>
    @break

    @case(5)
        <span class="badge bg-label-warning me-1">{{ $COOKING }}</span>
    @break

    @case(6)
        <span class="badge bg-label-success me-1">{{ $SERVED }}</span>
    @break

    @case(7)
        <span class="badge bg-label-secondary me-1">{{ $DRAFT }}</span>
    @break

    @case(8)
        <span class="badge bg-label-info me-1">{{ $PENDING }}</span>
    @break

    @case(9)
        <span class="badge bg-label-success me-1">{{ $ACCEPTED }}</span>
    @break

    @case(10)
        <span class="badge bg-label-danger me-1">{{ $REJECTED }}</span>
    @break

    @case(11)
        <span class="badge bg-label-warning me-1">{{ $PENDING_ORDER }}</span>
    @break

    @case(12)
        <span class="badge bg-label-info me-1">{{ $SHIPPING }}</span>
    @break

    @case(13)
        <span class="badge bg-label-info me-1">{{ $SHIPPED }}</span>
    @break

    @case(14)
        <span class="badge bg-label-success me-1">{{ $FINISHED }}</span>
    @break

    @case(15)
        <span class="badge bg-label-danger me-1">{{ $CANCELED }}</span>
    @break

    @case(16)
        <span class="badge bg-label-danger me-1">{{ $EATING }}</span>
    @break

    @case(17)
        <span class="badge bg-label-danger me-1">{{ $RESERVED }}</span>
    @break

    @case(18)
        <span class="badge bg-label-danger me-1">{{ $EMPTY }}</span>
    @break

    @default
@endswitch
