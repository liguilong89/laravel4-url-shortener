<?php

class shorturlsController extends BaseController {

    /**
     * shorturl Repository
     *
     * @var shorturl
     */
    protected $shorturl;

    public function __construct(Shorturl $shorturl)
    {
        $this->shorturl = $shorturl;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $shorturls = $this->shorturl->all();

        return View::make('shorturls.index', compact('shorturls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('shorturls.create');
    }

    /**
     * Store a newly created resource in storage.  POST
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Shorturl::$rules);

        if ($validation->passes())
        {
            $shorturl = $this->shorturl->create($input);

            $shorcode = $this->shorturl->convertIntToShortCode($shorturl->id);
            
            $shorturl->update(array( 'short_code'=> $shorcode ));

            return Redirect::route('shorturls.index');
        }


        return Redirect::route('shorturls.create')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were '.$validation->messages().' errors.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $shorturl = $this->shorturl->findOrFail($id);

        return View::make('shorturls.show', compact('shorturl'));
    }

    /**
     * 301 Jump to the specified LONG URL 
     *
     * @param  string  $shortcode
     * @return Response
     */
    public function showLongUrl($shortcode)
    {
        $shorturl = $this->shorturl->where('short_code', $shortcode)->firstOrFail();

        return Redirect::to($shorturl->long_url, 301);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $shorturl = $this->shorturl->find($id);

        if (is_null($shorturl))
        {
            return Redirect::route('shorturls.index');
        }

        return View::make('shorturls.edit', compact('shorturl'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = array_except(Input::all(), '_method');
        $validation = Validator::make($input, shorturl::$rules);

        if ($validation->passes())
        {
            $shorturl = $this->shorturl->find($id);
            $shorturl->update($input);

            return Redirect::route('shorturls.show', $id);
        }

        return Redirect::route('shorturls.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->shorturl->find($id)->delete();

        return Redirect::route('shorturls.index');
    }

}