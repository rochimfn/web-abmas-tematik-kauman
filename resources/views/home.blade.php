@extends('layouts.admin')

@section('content')
<div class="row" style="margin-top: 50px; margin-left: 200px;">
  <div style="margin-left: 15px;"><h2>Dashboard</h2></div>
</div>
<div class="header bg-gradient-primary pb-3 pt-3 pt-md-3" style="margin-left: 200px;">
<div class="container-fluid" >
    <div><h4 class="mb-3" >Statistika Permintaan Surat</h4></div>
    <div class="header-body">
        <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-stats-title text-primary">Surat Masuk</h5>
                        <div class="card-stats-item">
                            <div><span class="h4 font-weight-bold ">27</span></div>
                        </div>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape">
                      <i class="fas fa-sign-in-alt"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 ">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-stats-title  text-muted">Surat Diproses</h5>
                        <div class="card-stats-item">
                            <div><span class="h4 font-weight-bold">16</span></div>
                        </div>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape ">
                      <i class="fas fa-tasks"></i>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 ">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-stats-title  text-success">Surat Selesai</h5>
                        <div class="card-stats-item">
                          <div><span class="h4 font-weight-bold">95</span></div>
                        </div>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape">
                      <i class="fas fa-check-double"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
