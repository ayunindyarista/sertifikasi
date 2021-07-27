@extends('dashboard')
@section('title', 'Data Karyawan') 
@section('body')
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <h5 class="card-header">Jumlah Customer</h5>
      <div class="card-body">
        <p class="card-text"><i class="bi bi-person-fill" style="font-size: 5rem;"></i>
            @if(!empty($customer))
                <label style="font-size:50px;" >Jumlah Customer : {{ count($customer) }}</label>
            @endif
        </p>
      </div>
    </div>
  </div>
</div>
<div class="row">

 <div class="col-sm-6">
    <div class="card">
    <h5 class="card-header">Jumlah Customer</h5>
      <div class="card-body">
        <p class="card-text"><i class="bi bi-person-fill" style="font-size: 5rem;"></i>
            @if(!empty($customer))
            <?php $gresik=0; $sby=0; $sda=0; ?>
                @foreach($customer as $c => $val)
                    @if($val['kota'] == 'Gresik')
                        <?php $gresik += count(array($val['kota'])); ?>
                    @elseif($val['kota'] == 'Surabaya')
                        <?php $sby += count(array($val['kota'])); ?>
                    @elseif($val['kota'] == 'Sidoarjo')
                        <?php $sda += count(array($val['kota'])); ?>
                    @endif
                @endforeach
                <label style="font-size:20px;" >Jumlah Customer Surabaya: <?php echo $sby ?></label>
            @endif
        </p>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
  
</div>
  <!-- <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
</div> -->
@endsection