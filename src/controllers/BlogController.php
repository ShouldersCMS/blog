<?php namespace Shoulderscms\Blog\Controllers;

use \Input;
use Shoulderscms\Blog\Models\Blog;
use Shoulderscms\Shoulderscms\Models\Meta as Meta;
use \Redirect;
use \Safeurl;
use \View;
use \Auth;

class BlogController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = new Blog;
		$posts = $posts::paginate(15);
		return View::make('blog::admin.index', ['posts' => $posts]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$page = '';
		return View::make('blog::admin.create', ['post' => $page]);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$meta = new Meta;
		$meta->meta_robots = Input::get('meta_robots');
		$meta->meta_description = Input::get('meta_description');
		$meta->meta_og_title = Input::get('meta_og_title');
		$meta->save();

		$blog = new Blog;
		$blog->title = Input::get('title');
		$blog->content = Input::get('content');
		$blog->user_id = Auth::id();
		$blog->slug = Safeurl::make(Input::get('title'));
		$blog->meta_id = $meta->id;
		$blog->save();
		return Redirect::to('admin/blog');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showIndex()
	{
		$blog = Blog::paginate(10);
		return View::make('shoulderscms::clean.index', ['posts' => $blog]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$blog = new Blog;
		$blog = $blog->where('slug', $slug)->first();

		return View::make('shoulderscms::clean.post', ['post' => $blog]);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$blog = new Blog;
		$blog = $blog->findOrFail($id);
		$meta = new Meta;
		$meta = $meta->findOrFail($blog->meta_id);
		$blog = array_merge($meta->toArray(), $blog->toArray());
		
		return View::make('blog::admin.create', ['post' => $blog]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$blog = new Blog;
		$blog = $blog->findOrFail($id);
		$blog->title = Input::get('title');
		$blog->content = Input::get('content');
		$blog->slug = Safeurl::make(Input::get('title'));
		$blog->save();

		$meta = new Meta;
		$meta = $meta->findOrFail($blog->meta_id);
		$meta->meta_robots = Input::get('meta_robots');
		$meta->meta_description = Input::get('meta_description');
		$meta->meta_og_title = Input::get('meta_og_title');
		$meta->save();
		return Redirect::to('admin/blog');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$blog = new Blog;
		$blog = $blog->findOrFail($id);
		$blog->delete();
		return Redirect::to('admin/blog');
	}


}
