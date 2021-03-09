<style>
.switch {
    top: 0;
    bottom: 0;
    right: 0;
    left: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0;
    padding: 0;
}

.switch>label {
    display: block;
    width: 80px;
    background: #CCC;
    height: 40px;
    border-radius: 40px;
    background: linear-gradient(to bottom, #9e9e9e 30%, #f4f4f4);
    box-shadow: 0 1px 0 0 #fff, 0 -1px 0 0 #969494;
    position: relative;
    -webkit-tap-highlight-color: rgba(255, 255, 255, 0);
}

.switch>label input {
    display: none;
}

.switch>label div {
    display: block;
    width: 60px;
    height: 25px;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    background: linear-gradient(to bottom, #8b8c8e 10%, #f4f4f4);
    border-radius: 25px;
}

.switch>label div:after {
    content: "";
    position: absolute;
    display: block;
    height: 23px;
    width: 58px;
    left: 2px;
    top: 2px;
    border-radius: 10px;
    background: #828080;
    box-shadow: inset 0 0 15px 0 rgba(0, 0, 0, 0.8);
    transition: 0.2s;
}

.switch>label i {
    display: block;
    width: 30px;
    height: 30px;
    position: absolute;
    background: linear-gradient(to top, #9e9e9e 20%, #f4f4f4);
    border-radius: 50%;
    box-shadow: 0 2.5px 5px 0 rgba(0, 0, 0, 0.7);
    top: 5px;
    left: 7.5px;
    transition: 0.25s;
}

.switch>label i:after {
    content: "";
    position: absolute;
    display: block;
    width: 26px;
    height: 26px;
    left: 2px;
    top: 2px;
    border-radius: 50%;
    background: #d5d4d4;
    z-index: 1;
}

.switch>label input:checked~i {
    top: 5px;
    left: 43px;
}

.switch>label input:checked+div:after {
    background: #00ff11;
    box-shadow: inset 0 0 30px 0 rgba(0, 0, 0, 0.6);
}

.switch>label input:checked+div>.off {
    color: transparent;
    text-shadow: 0 1px 0 rgba(255, 255, 255, 0);
}

.switch>label input:checked+div>.on {
    color: white;
    text-shadow: 0 1px 0 rgba(255, 255, 255, 0.3);
}

.switch>label:after {
    content: "";
    position: absolute;
    display: block;
    width: 82px;
    height: 42px;
    border-radius: 42px;
    background: red;
    top: -2px;
    left: -2px;
    z-index: -1;
    background: linear-gradient(to bottom, #969494, #fff);
}

.switch>label:hover {
    cursor: pointer;
}

.switch>label:focus,
.switch>label:active {
    outline: 0;
}

.on,
.off {
    text-transform: uppercase;
    position: absolute;
    left: 8.5px;
    top: 50%;
    transform: translateY(-50%);
    font-size: .6em;
    font-weight: 600;
    z-index: 2;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    letter-spacing: 1px;
    transition: 0.25s;
}

.on {
    color: transparent;
    text-shadow: 0 1px 0 rgba(255, 255, 255, 0);
}

.off {
    left: initial;
    right: 8.5px;
    color: white;
    text-shadow: 0 1px 0 rgba(255, 255, 255, 0.2);
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row" style="min-height: 150px;">
                <div class="col-lg-3 text-center">
                    <div class="small-box bg-warning pt-3 pb-2">
                        <div class="inner">
                            <h4 class="mb-3">Suhu</h4>
                            <h3><span class="suhu">0</span>&#176;C</h3>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 text-center">
                    <div class="small-box bg-info pt-3 pb-2">
                        <div class="inner">
                            <h4 class="mb-3">Kelembaban</h4>
                            <h3><span class="kelembaban"></span>%</h3>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 text-center">
                    <h4>Lampu</h4>
                    <div class="switch">
                        <label>
                            <input type="checkbox" checked />
                            <div>
                                <span class="on">On</span>
                                <span class="off">Off</span>
                            </div>
                            <i></i>
                        </label>
                    </div>
                    <p>On / Off</p>
                </div>
                <div class="col-lg-3 text-center">
                    <h4>Kipas</h4>
                    <div class="switch">
                        <label>
                            <input type="checkbox" checked />
                            <div>
                                <span class="on">On</span>
                                <span class="off">Off</span>
                            </div>
                            <i></i>
                        </label>
                    </div>
                    <p>On / Off</p>
                </div>
            </div>
            <div class="row">
                <div class="card-body">
                    <div class="chart">
                        <canvas id="lineChart" style="min-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->