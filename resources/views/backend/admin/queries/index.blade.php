@extends('backend.layouts.app')

@section('title', 'Queries')

@section('backend-content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{__('Queries')}}</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                    </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 10%">{{__('Sl')}}</th>
                    <th style="width: 15%">{{__('Name')}}</th>
                    <th style="width: 15%">{{__('E-mail')}}</th>
                    <th style="width: 15%">{{__('Phone')}}</th>
                    <th style="width: 35%">{{__('Message')}}</th>
                    <th style="width: 10%">{{__('Action')}}</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($queries as $item)
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{Str::limit($item->message, 150)}}</td>
                            <td>
                                <a class="btn btn-sm bg-blue" href="{{route('admin.queries.show',[$item->id])}}"><span class="fas fa-eye"></span></a>

                                    	<form action="{{route('admin.queries.destroy',[$item->id])}}" method="post" style="display: none;" id="delete-form-{{ $item->id}}">
                                            @csrf
                                            {{method_field('DELETE')}}
                                        </form>
                                        <a class="btn btn-sm bg-red" href="" onclick="if(confirm('Are You Sure To Delete?')){
                                            event.preventDefault();
                                            getElementById('delete-form-{{ $item->id}}').submit();
                                            }else{
                                            event.preventDefault();
                                            }"><span class="fas fa-trash"></span></a>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection