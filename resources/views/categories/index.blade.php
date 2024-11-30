@extends('admin.layouts.app')
@section('title', 'Category')
@section('content')
    <section class="section">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="card-title">Danh mục</h1>
                            </div>
                        </div>
                        <form method="GET" action="{{ route('categories.index') }}" class="d-flex">
                            <input type="text" name="search" class="form-control me-2" placeholder="Tìm kiếm danh mục"
                                   value="{{ request()->get('search') }}">
                            <button type="submit" class="btn btn-primary">Tìm</button>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>PARENT NAME</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{ $item->parent_name ?? 'N/A' }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ route('admin.categories.show', ['id' => $item->id,
                                                       'page' =>request()->get('page')]) }}"
                                               class="btn btn-outline-primary">Chi tiết</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$categories->links()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
