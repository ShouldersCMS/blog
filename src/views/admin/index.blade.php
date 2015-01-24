@extends('shoulderscms::AdminLTE.layouts.master')

@section('main')
    
     <!-- Main content -->
            <section class="content">

                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-md-8">
                        <div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">Manage Posts</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <table class="table table-striped">
                                        <tbody><tr>
                                            <th style="width: 10px">ID</th>
                                            <th style="width: 40%">Page</th>
                                            <th>Actions</th>
                                        </tr>
                                        @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $post->id }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    {{ Form::open(array('url' => '/admin/blog/' . $post->id . '/edit', 'method' => 'get')) }}
                                                        {{ Form::button('<i class="fa fa-fw fa-pencil"></i> Edit', ['class' => 'btn btn-default btn-sm', 'type' => 'submit']) }}
                                                    {{ Form::close() }}
                                                    {{ Form::open(array('url' => '/blog/'.$post->slug, 'method' => 'get')) }}
                                                        {{ Form::button('<i class="fa fa-fw fa-external-link"></i> View', ['class' => 'btn btn-default btn-sm', 'type' => 'submit']) }}
                                                    {{ Form::close() }}
                                                    {{ Form::open(array('url' => '/admin/blog/'. $post->id . '', 'method' => 'delete')) }}
                                                        {{ Form::button('<i class="fa fa-fw fa-times-circle"></i> Delete', ['class' => 'btn btn-default btn-sm', 'type' => 'submit'])}}
                                                    {{ Form::close() }}
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody></table>
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    {{ $posts->links() }}
                                </div>
                            </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box box-info">
                            <div class="box-header">
                                <i class="fa fa-gears"></i>
                                <h3 class="box-title">Settings</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <a href="/admin/blog/create" class="btn btn-primary">Create New</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            

            <script type="text/javascript">

            $(function() {
                //bootstrap WYSIHTML5 - text editor
                $(".textarea").wysihtml5();
            });
        
            </script>
@stop