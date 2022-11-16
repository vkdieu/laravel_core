@extends('frontend.layouts.default')

@php
$page_title = $taxonomy->title ?? ($page->title ?? ($page->name ?? ''));
$image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
@endphp

@section('content')
  {{-- Print all content by [module - route - page] without blocks content at here --}}
  <section class="with-bg solid-section">
    <div class="fix-image-wrap" data-image-src="{{ $image_background }}" data-parallax="scroll"></div>
    <div class="theme-back"></div>
    <div class="container page-info">
      <div class="section-alt-head container-md">
        <h1 class="section-title text-upper text-lg" data-inview-showup="showup-translate-right">{{ $page_title }}</h1>
      </div>
    </div>
    <div class="section-footer">
      <div class="container" data-inview-showup="showup-translate-down">
        <ul class="page-path">
          <li><a href="{{ route('frontend.home') }}">@lang('Home')</a></li>
          <li class="path-separator"><i class="fas fa-chevron-right" aria-hidden="true"></i></li>
          <li>{{ $page_title }}</li>
        </ul>
      </div>
    </div>
  </section>

  <section class="map-section" data-inview-showup="showup-translate-up">
    @isset($web_information->source_code->map)
      <div class="gmap">
        {!! $web_information->source_code->map !!}
      </div>
    @endisset
    <div class="info-wrap">
      <div class="info-container">
        <div class="our-info main-bg">
          <div class="info-block">
            <div class="info-title text-upper">{{ $web_information->information->site_name ?? '' }}</div>
            @isset($web_information->information->address)
              <div class="info-line">
                <span class="info-icon">
                  <i class="fas fa-map-marker-alt fa-fw" aria-hidden="true"></i>
                </span>
                {{ $web_information->information->address }}
              </div>
            @endisset
            @isset($web_information->information->phone)
              <div class="info-line">
                <span class="info-icon">
                  <i class="fas fa-phone fa-fw" aria-hidden="true"></i>
                </span>
                {{ $web_information->information->phone }}
              </div>
            @endisset
            @isset($web_information->information->email)
              <div class="info-line">
                <span class="info-icon">
                  <i class="far fa-envelope fa-fw" aria-hidden="true"></i>
                </span>
                {{ $web_information->information->email }}
              </div>
            @endisset
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="content-section">
    <div class="container">
      <div class="section-head text-center container-md">
        <h2 class="section-title text-upper text-lg" data-inview-showup="showup-translate-right">{{ $page_title }}</h2>
        <p data-inview-showup="showup-translate-left">{{ $web_information->information->slogan ?? '' }}</p>
      </div>
      <form class="md-col-8 md-col-offs-2 form_ajax" data-inview-showup="showup-translate-down" method="post"
        action="{{ route('frontend.contact.store') }}">
        @csrf
        <div class="field-group">
          <div class="field-wrap">
            <input class="field-control" name="name" placeholder="@lang('Fullname') *" required="required" autocomplete="off">
            <span class="field-back"></span>
          </div>
        </div>
        <div class="field-group">
          <div class="field-wrap">
            <input class="field-control" name="email" type="email" placeholder="Email" required="required" autocomplete="off">
            <span class="field-back"></span>
          </div>
        </div>
        <div class="field-group">
          <div class="field-wrap">
            <input class="field-control" name="phone" placeholder="@lang('Phone') *" required="required" autocomplete="off">
            <span class="field-back"></span>
          </div>
        </div>
        <div class="field-group">
          <div class="field-wrap">
            <textarea class="field-control" name="content" placeholder="@lang('Content') *" required="required" autocomplete="off"></textarea>
            <span class="field-back"></span>
          </div>
        </div>
        <input type="hidden" name="is_type" value="contact">
        <div class="btn-block text-center">
          <button class="btn text-upper" type="submit">
            @lang('Send message')
          </button>
        </div>
      </form>
    </div>
  </section>

  {{-- End content --}}
@endsection
