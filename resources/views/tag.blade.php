@extends('layouts.frontend')

@section('content')
<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">{{$tag->tag}}</h1>
    </div>
</div>

<!-- Post Details -->


<div class="container">
    <div class="row medium-padding120">
      <main class="main">

          <div class="row">
                      <div class="case-item-wrap">
                        @foreach($tag->posts as $post)
                          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                              <div class="case-item">
                                  <div class="case-item__thumb">
                                      <img src="{{$post->featured}}" alt="{{$post->title}}">
                                  </div>
                                  <h6 class="case-item__title"><a href="{{ route('post.single',['slug' => $post->slug])}}">{{$post->title}}</a></h6>
                              </div>
                          </div>
                          @endforeach
                      </div>
          </div>

          <!-- End Post Details -->
          <br>
          <br>
          <br>
          <!-- Sidebar-->

          <div class="col-lg-12">
              <aside aria-label="sidebar" class="sidebar sidebar-right">
                  <div  class="widget w-tags">
                      <div class="heading text-center">
                          <h4 class="heading-title">ALL BLOG CATEGORY</h4>
                          <div class="heading-line">
                              <span class="short-line"></span>
                              <span class="long-line"></span>
                          </div>
                      </div>

                      <div class="tags-wrap">
                        @foreach($categories as $category)
                          <a href="{{ route('category.single', ['id' => $category->id])}}" class="w-tags-item">{{ $category->name }}</a>
                        @endforeach
                      </div>
                  </div>
              </aside>
          </div>

          <!-- End Sidebar-->

      </main>
    </div>
</div>
@endsection
