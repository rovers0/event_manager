@extends('cpadmin.master')
@section('title','Index')
@section('content')
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Danh sách</h3>
            <div class="card-tools">
                <a href="{{Route('admin.evaluate.create')}}" class="btn btn-primary"  title="Create new Category">ADD MORE</a>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>Name</th>
                     <th>Description</th>
                     <th>created_at</th>
                     <th>EDIT</th>
                     <th>Delete</th>
                  </tr>
               </thead>
               <tbody>
                   @foreach ($category as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td >
                        @switch($item->status)
                        @case(1)
                            <p class="text-success">DONE</p>
                            @break
                        @case(2)
                            <p class="text-danger">OPEN USER</p>
                            <a class="bg-primary rounded-pill p-2 text-center" href="{{Route('admin.evaluate.show',['id'=>$item->id])}}">Danh gia sv</a>
                            @break
                        @default
                            <p class="text-primary">OPEN LEAD</p>
                            <a class="bg-primary rounded-pill p-2 text-center" href="{{Route('admin.evaluate.show',['id'=>$item->id])}}">Danh gia sv</a>                        
                        @endswitch
                        </td>
                        <td> {{date("d/m/Y-h:i:s",strtotime($item->created_at))}}</td>
                        <td><a class="bg-primary rounded-pill p-2 text-center" href="{{Route('admin.evaluate.edit',['id'=>$item->id])}}">EDIT</a><br><br></td>
                        <td><a class="bg-danger rounded-pill p-2 text-center" href="{{Route('admin.evaluate.destroy',['id'=>$item->id])}}" onclick="return checkdelete('Are You Sure delete this class ?')">DELETE</a></td>
                    </tr>         
                    @endforeach    
               </tbody>
               {{-- <tfoot>
                <tr>
                    <th>ID</th>
                     <th>Name</th>
                     <th>Description</th>
                     <th>created_at</th>
                     <th>EDIT</th>
                     <th>Delete</th>
                 </tr>
               </tfoot> --}}
            </table>
         </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
</section>
@endsection