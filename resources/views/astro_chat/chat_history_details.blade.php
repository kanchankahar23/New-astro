@extends('website.dashboard_master')
@section('title','Chat Details')
@section('content')
<div class="container">
    <div class="card">
        <div class="mb-0 card">
                       <div class="card-body">
                         <h5 class="mb-4 card-title">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm" style="width: 40px; height: 40px; overflow: hidden; border-radius: 50%; border: 2px solid #ff7010;">
                                <img src="{{ asset($user->avtar ?? '' )}}" alt="" style="
                                    width: 100%; object-fit: cover; height: 100%;">

                                </div>
                                &nbsp;{{ $user->name ?? '' }}
                            </div>

                         </h5>

                         <div class="row">
                           <div class="px-0 col-lg-12">
                             <div class="table-responsive">
                               <table class="table mb-0 align-middle table-borderless table-hover">
                                 <thead class="table-light">
                                   <tr>
                                     <th scope="col" class="text-center">S.No</th>
                                     <th scope="col" class="text-center">Duration</th>
                                     <th scope="col" class="text-center">Date</th>
                                     <th scope="col" class="text-center">Deduct Amount</th>
                                   </tr>
                                 </thead>
                                 <tbody>
                                    @if($logs->count() <= 0)
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            <h6 style="border:2px solid #ffcd3a;padding:6px;">No Chats Details</h6>
                                        </td>
                                    </tr>
                                    @endif
                                    @foreach($logs as $key => $log)
                                    @if(!empty($log->deduct_amount))
                                        <tr>
                                            <td class="text-center">
                                                {{ ++$key }}.
                                            </td>
                                            <td style="
                                                                                    font-size: 13px;
                                                                                    font-weight: 400;
                                                                                " class="text-center">
                                                <i class="fa-solid fa-clock" style="
                                                                                margin-right: 5px;
                                                                                color: #ff7010;margin-top: 15px
                                                                                " aria-hidden="true"></i>
                                                {{ gmdate('H:i:s',$log->duration ?? '0') }}
                                            </td>
                                            <td class="text-center" style="
                                                                                    font-size: 13px;
                                                                                    font-weight: 400;
                                                                                ">
                                                <i class="fa-solid fa-calendar-days" style="
                                                                                    margin-right: 5px;
                                                                                    color: #ff7010;margin-top: 15px
                                                                                    " aria-hidden="true"></i>{{
                                                $log->date ?? ''}}
                                            </td>
                                            <td class="text-center" style="
                                                                                    font-size: 13px;
                                                                                    font-weight: 400;
                                                                                ">
                                                <i class="fa-solid fa-indian-rupee" style="
                                                                                    margin-right: 5px;
                                                                                    color: #ff7010;margin-top: 15px
                                                                                    " aria-hidden="true"></i>{{
                                                $log->deduct_amount ?? 0}}
                                            </td>

                                        </tr>
                                    @endif
                                    @endforeach

                                </tbody>

                               </table>
                               {{ $logs->links() }}
                             </div>

                           </div>

                         </div>
                       </div>
                       <!-- end card body -->
                     </div>
         <!--end card-body-->
       </div>
    </div>
@endsection
