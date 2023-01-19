@extends('layouts.home')
{{-- @section('search')
<div class="navbar-nav align-items-center">
    <div class="nav-item d-flex align-items-center">
      <i class="bx bx-search fs-4 lh-0"></i>
      <input
        type="text"
        class="form-control border-0 shadow-none"
        placeholder="Search..."
        aria-label="Search..."
      />
    </div>
  </div>
@endsection --}}
@section('isi')
    @can('superadmin')
    @elsecan('admin')

          <div class="col-lg-8 mb-4 order-0">
            <div class="card">
              <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                  <div class="card-body">
                    <h5 class="card-title text-primary">Congratulations {{ Auth::user()->name }}! 🎉</h5>
                    <p class="mb-4">
                      Selamat admin! <span class="fw-bold">32%</span> Penyewaan hari ini mengalami peningkatan.
                    </p>

                    
                  </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                  <div class="card-body pb-0 px-0 px-md-4">
                    <img
                      src="../assets/img/illustrations/man-with-laptop-light.png"
                      height="140"
                      alt="View Badge User"
                      data-app-dark-img="illustrations/man-with-laptop-dark.png"
                      data-app-light-img="illustrations/man-with-laptop-light.png"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 order-1">
            <div class="row">
              <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                        <img
                          src="../assets/img/icons/unicons/chart-success.png"
                          alt="chart success"
                          class="rounded"
                        />
                      </div>
                  
                    </div>
                    <span class="fw-semibold d-block mb-1">Kategori</span>
                    <h3 class="card-title mb-2">{{ $kategori }}</h3>
                    
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                        <img
                          src="../assets/img/icons/unicons/wallet-info.png"
                          alt="Credit Card"
                          class="rounded"
                        />
                      </div>
                    
                    </div>
                    <span>Belum selesai</span>
                    <h3 class="card-title text-nowrap mb-1">{{ $belum }}</h3>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Total Revenue -->
          <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
            <div class="card">
              <div class="row row-bordered g-0">
               
               
              </div>
            </div>
          </div>
          <!--/ Total Revenue -->
          <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
            <div class="row">
              <div class="col-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                        <img src="../assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />
                      </div>
                
                    </div>
                    <span class="d-block mb-1">Sudah selesai</span>
                    <h3 class="card-title text-nowrap mb-2">{{ $sudah }}</h3>
                    
                  </div>
                </div>
              </div>
             
            

            
            </div>
          </div>
        
    @elsecan('user')
    <div class="col-lg-8 mb-4 order-0">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-sm-7">
            <div class="card-body">
              <h5 class="card-title text-primary">Congratulations {{ Auth::user()->name }}! 🎉</h5>
              <p class="mb-4">
                You have done <span class="fw-bold">72%</span> more sales today. Check your new badge in
                your profile.
              </p>

              
            </div>
          </div>
          <div class="col-sm-5 text-center text-sm-left">
            <div class="card-body pb-0 px-0 px-md-4">
              <img
                src="../assets/img/illustrations/man-with-laptop-light.png"
                height="140"
                alt="View Badge User"
                data-app-dark-img="illustrations/man-with-laptop-dark.png"
                data-app-light-img="illustrations/man-with-laptop-light.png"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 order-1">
      <div class="row">
        <div class="col-lg-6 col-md-12 col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img
                    src="../assets/img/icons/unicons/chart-success.png"
                    alt="chart success"
                    class="rounded"
                  />
                </div>
               
              </div>
              <span class="fw-semibold d-block mb-1">Total pesanan anda</span>
              <h3 class="card-title mb-2">{{ $user }}</h3>
              <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i></small>
            </div>
          </div>
        </div>
      
      </div>
    </div>
    <!-- Total Revenue -->
    <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
      <div class="card">
        <div class="row row-bordered g-0">
         
         
        </div>
      </div>
    </div>
    <!--/ Total Revenue -->
  
    @endcan
@endsection