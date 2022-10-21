@extends('errors::minimal')

@section('title', __('Link Expired'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
