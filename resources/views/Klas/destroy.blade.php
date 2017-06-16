@extends('layouts.co')

@section('content')
<form action="{{ route('Klas.destroy') }}" method="post">
    {{ csrf_field() }}
        <input type="hidden" name="_method" value="delete">

    <table class="table table-striped border-top" id="sample_1">
        <thead>
            <tr>
                <th style="width: 8px;">
                    <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                </th>
                <th>name</th>
                <th class="hidden-phone">namePrimary</th>
                <th class="hidden-phone">count</th>
                <th class="hidden-phone">date</th>
                    <th class="hidden-phone">delete</th>
                    <th class="hidden-phone">edit</th>
            </tr>
        </thead>
    <tbody>

    @foreach($categories as $category)
        <tr class="odd gradeX">
            <td><input type="checkbox" name="categories[]" class="checkboxes" value="{{ $category->id }}" /></td>
            <td>{{ $category->categoryName }}</td>  
            <td class="hidden-phone">{{ $category->categoryEnName }}</td>
            <td class="hidden-phone">{{ $category->product->count() }}</td>
            <td class="center hidden-phone">{{ $category->created_at }}</td>
            <td class="hidden-phone">
                <a class="btn btn-danger" href="{{ action('CategoryController@DeleteCategory' , $category->id) }}"><i class="icon-trash"></i> </a>
            </td>
            <td class="hidden-phone"><a class="btn btn-primary" href="#"><i class="icon-edit"></i> </a> </td>
        </tr>
      @endforeach
      <button class="btn btn-danger">Delete Checked</button>
    </form>
  </tbody>
</table>