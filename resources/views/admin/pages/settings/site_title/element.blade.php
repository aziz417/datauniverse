<div class="row">
    <div class="col-sm-12">
        <h3>Site Title</h3>
        <div class="form-group">
    <textarea class="form-control TextEditor" name="site_title"  id="description">
            {{ isset($site_title->site_title) && $site_title->site_title ? $site_title->site_title : old('site_title')}}
        </textarea>
            @error('site_title')
            <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
            @enderror
        </div>
    </div>
<div class="col-sm-12">
    <h3>Home Page All Titles</h3>
</div>
    <div class="col-sm-4">
        <div class="form-group">
    <textarea class="form-control TextEditor" name="h_title_1"  id="description">
            {{ isset($site_title->h_title_1) && $site_title->h_title_1 ? $site_title->h_title_1 : old('h_title_1')}}
        </textarea>
            @error('h_title_1')
            <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
            @enderror
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
    <textarea class="form-control TextEditor" name="h_title_2"  id="description">
            {{ isset($site_title->h_title_2) && $site_title->h_title_2 ? $site_title->h_title_2 : old('h_title_2')}}
        </textarea>
            @error('h_title_2')
            <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
            @enderror
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
    <textarea class="form-control TextEditor" name="h_title_3"  id="description">
            {{ isset($site_title->h_title_3) && $site_title->h_title_3 ? $site_title->h_title_3 : old('h_title_3')}}
        </textarea>
            @error('h_title_3')
            <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
            @enderror
        </div>
    </div>
</div>

<div class="row">

    <div class="col-sm-4">
        <div class="form-group">
    <textarea class="form-control TextEditor" name="h_title_4"  id="description">
            {{ isset($site_title->h_title_4) && $site_title->h_title_4 ? $site_title->h_title_4 : old('h_title_4')}}
        </textarea>
            @error('h_title_4')
            <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
            @enderror
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
    <textarea class="form-control TextEditor" name="h_title_5"  id="description">
            {{ isset($site_title->h_title_5) && $site_title->h_title_5 ? $site_title->h_title_5 : old('h_title_5')}}
        </textarea>
            @error('h_title_5')
            <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
            @enderror
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
    <textarea class="form-control TextEditor" name="h_title_6"  id="description">
            {{ isset($site_title->h_title_6) && $site_title->h_title_6 ? $site_title->h_title_6 : old('h_title_6')}}
        </textarea>
            @error('h_title_6')
            <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
    <textarea class="form-control TextEditor" name="h_title_7"  id="description">
            {{ isset($site_title->h_title_7) && $site_title->h_title_7 ? $site_title->h_title_7 : old('h_title_7')}}
        </textarea>
            @error('h_title_7')
            <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
            @enderror
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
    <textarea class="form-control TextEditor" name="h_title_8"  id="description">
            {{ isset($site_title->h_title_8) && $site_title->h_title_8 ? $site_title->h_title_8 : old('h_title_8')}}
        </textarea>
            @error('h_title_8')
            <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <h3>Subscribe</h3>
            <textarea class="form-control TextEditor" name="subscribe"  id="description">
            {{ isset($site_title->subscribe) && $site_title->subscribe ? $site_title->subscribe : old('subscribe')}}
        </textarea>
            @error('subscribe')
            <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
            @enderror
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <h3>Location</h3>
            <textarea class="form-control TextEditor" name="location"  id="description">
            {{ isset($site_title->location) && $site_title->location ? $site_title->location : old('location')}}
        </textarea>
            @error('location')
            <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
            @enderror
        </div>
    </div>
</div>

<h3>Footer Section</h3>
<div class="row">
    <div class="col-sm-3">
        <div class="form-group">
    <textarea class="form-control TextEditor" name="f_home"  id="description">
            {{ isset($site_title->f_home) && $site_title->f_home ? $site_title->f_home : old('f_home')}}
        </textarea>
            @error('f_home')
            <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
            @enderror
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
    <textarea class="form-control TextEditor" name="f_our_services"  id="description">
            {{ isset($site_title->f_our_services) && $site_title->f_our_services ? $site_title->f_our_services : old('f_our_services')}}
        </textarea>
            @error('f_our_services')
            <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
            @enderror
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
    <textarea class="form-control TextEditor" name="f_on_emergency"  id="description">
            {{ isset($site_title->f_on_emergency) && $site_title->f_on_emergency ? $site_title->f_on_emergency : old('f_on_emergency')}}
        </textarea>
            @error('f_on_emergency')
            <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
            @enderror
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
    <textarea class="form-control TextEditor" name="f_address"  id="description">
            {{ isset($site_title->f_address) && $site_title->f_address ? $site_title->f_address : old('f_address')}}
        </textarea>
            @error('f_address')
            <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <h3>About Us</h3>
            <textarea class="form-control TextEditor" name="a_title_1"  id="description">
            {{ isset($site_title->a_title_1) && $site_title->a_title_1 ? $site_title->a_title_1 : old('a_title_1')}}
        </textarea>
            @error('f_address')
            <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
            @enderror
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            <h3>Career Details Page</h3>
            <textarea class="form-control TextEditor" name="c_d_title_1"  id="description">
            {{ isset($site_title->c_d_title_1) && $site_title->c_d_title_1 ? $site_title->c_d_title_1 : old('c_d_title_1')}}
        </textarea>
            @error('c_d_title_1')
            <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
            @enderror
        </div>
    </div>


    <div class="col-sm-4">
        <div class="form-group">
            <h3>Under Construction Page</h3>
            <textarea class="form-control TextEditor" name="uc_title_1"  id="description">
            {{ isset($site_title->uc_title_1) && $site_title->uc_title_1 ? $site_title->uc_title_1 : old('uc_title_1')}}
        </textarea>
            @error('uc_title_1')
                <span class="help-block m-b-none text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>

<h3>Career Page</h3>

<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
        <textarea class="form-control TextEditor" name="c_title_1"  id="description">
            {{ isset($site_title->c_title_1) && $site_title->c_title_1 ? $site_title->c_title_1 : old('c_title_1')}}
        </textarea>
            @error('c_title_1')
            <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
            @enderror
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
        <textarea class="form-control TextEditor" name="c_title_2"  id="description">
            {{ isset($site_title->c_title_2) && $site_title->c_title_2 ? $site_title->c_title_2 : old('c_title_2')}}
        </textarea>
            @error('c_title_2')
            <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
            @enderror
        </div>
    </div>


    <div class="col-sm-4">
        <div class="form-group">
        <textarea class="form-control TextEditor" name="c_title_3"  id="description">
            {{ isset($site_title->c_title_3) && $site_title->c_title_3 ? $site_title->c_title_3 : old('c_title_3')}}
        </textarea>
            @error('c_title_3')
            <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
            @enderror
        </div>
    </div>
</div>

<h3>Blog Page</h3>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
        <textarea class="form-control TextEditor" name="b_title_1"  id="description">
            {{ isset($site_title->b_title_1) && $site_title->b_title_1 ? $site_title->b_title_1 : old('b_title_1')}}
        </textarea>
            @error('b_title_1')
            <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
            @enderror
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
        <textarea class="form-control TextEditor" name="b_title_2"  id="description">
            {{ isset($site_title->b_title_2) && $site_title->b_title_2 ? $site_title->b_title_2 : old('b_title_2')}}
        </textarea>
            @error('c_title_2')
            <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
            @enderror
        </div>
    </div>


    <div class="col-sm-4">
        <div class="form-group">
        <textarea class="form-control TextEditor" name="b_title_3"  id="description">
            {{ isset($site_title->b_title_3) && $site_title->b_title_3 ? $site_title->b_title_3 : old('b_title_3')}}
        </textarea>
            @error('b_title_3')
            <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
        <textarea class="form-control TextEditor" name="b_title_4"  id="description">
            {{ isset($site_title->b_title_4) && $site_title->b_title_4 ? $site_title->b_title_4 : old('b_title_4')}}
        </textarea>
            @error('b_title_4')
            <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
            @enderror
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
        <textarea class="form-control TextEditor" name="b_title_5"  id="description">
            {{ isset($site_title->b_title_5) && $site_title->b_title_5 ? $site_title->b_title_5 : old('b_title_5')}}
        </textarea>
            @error('c_title_5')
            <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
            @enderror
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
        <textarea class="form-control TextEditor" name="b_title_6"  id="description">
            {{ isset($site_title->b_title_6) && $site_title->b_title_6 ? $site_title->b_title_6 : old('b_title_6')}}
        </textarea>
            @error('b_title_6')
            <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
            @enderror
        </div>
    </div>
</div>

<h3>Blog Description</h3>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
        <textarea class="form-control TextEditor" name="b_d_title_1"  id="description">
            {{ isset($site_title->b_d_title_1) && $site_title->b_d_title_1 ? $site_title->b_d_title_1 : old('b_d_title_1')}}
        </textarea>
            @error('b_d_title_1')
            <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
            @enderror
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
        <textarea class="form-control TextEditor" name="b_d_title_2"  id="description">
            {{ isset($site_title->b_d_title_2) && $site_title->b_d_title_2 ? $site_title->b_d_title_2 : old('b_d_title_2')}}
        </textarea>
            @error('b_d_title_2')
            <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
            @enderror
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
        <textarea class="form-control TextEditor" name="b_d_title_3"  id="description">
            {{ isset($site_title->b_d_title_3) && $site_title->b_d_title_3 ? $site_title->b_d_title_3 : old('b_d_title_3')}}
        </textarea>
            @error('b_d_title_3')
            <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
            @enderror
        </div>
    </div>
</div>

<h3>FAQ Page</h3>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
        <textarea class="form-control TextEditor" name="faq_title_1"  id="description">
            {{ isset($site_title->faq_title_1) && $site_title->faq_title_1 ? $site_title->faq_title_1 : old('faq_title_1')}}
        </textarea>
            @error('faq_title_1')
            <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
            @enderror
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
        <textarea class="form-control TextEditor" name="faq_title_2"  id="description">
            {{ isset($site_title->faq_title_2) && $site_title->faq_title_2 ? $site_title->faq_title_2 : old('faq_title_2')}}
        </textarea>
            @error('faq_title_2')
            <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
            @enderror
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
        <textarea class="form-control TextEditor" name="faq_title_3"  id="description">
            {{ isset($site_title->faq_title_3) && $site_title->faq_title_3 ? $site_title->faq_title_3 : old('faq_title_3')}}
        </textarea>
            @error('faq_title_3')
            <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
            @enderror
        </div>
    </div>
</div>


<h3>Services page</h3>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
        <textarea class="form-control TextEditor" name="s_title_1"  id="description">
            {{ isset($site_title->s_title_1) && $site_title->s_title_1 ? $site_title->s_title_1 : old('s_title_1')}}
        </textarea>
            @error('s_title_1')
            <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
            @enderror
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
        <textarea class="form-control TextEditor" name="s_title_2"  id="description">
            {{ isset($site_title->s_title_2) && $site_title->s_title_2 ? $site_title->s_title_2 : old('s_title_2')}}
        </textarea>
            @error('s_title_2')
            <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
            @enderror
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
        <textarea class="form-control TextEditor" name="s_title_3"  id="description">
            {{ isset($site_title->s_title_3) && $site_title->s_title_3 ? $site_title->s_title_3 : old('s_title_3')}}
        </textarea>
            @error('s_title_3')
                <span class="help-block m-b-none text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>


<div class="row">
    <div class="col-sm-6">
        <h3>How we work page</h3>
        <div class="form-group">
        <textarea class="form-control TextEditor" name="hww_title_1"  id="description">
            {{ isset($site_title->hww_title_1) && $site_title->hww_title_1 ? $site_title->hww_title_1 : old('hww_title_1')}}
        </textarea>
            @error('hww_title_1')
            <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
            @enderror
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <h3>Contact page</h3>
            <textarea class="form-control TextEditor" name="contact_title_1"  id="description">
            {{ isset($site_title->contact_title_1) && $site_title->contact_title_1 ? $site_title->contact_title_1 : old('contact_title_1')}}
        </textarea>
            @error('contact_title_1')
            <span class="help-block m-b-none text-danger">
            {{ $message }}
        </span>
            @enderror
        </div>
    </div>
</div>