


<button onclick="go_back()">go back</button>
<br />
<a href="/ajax/a" class="my_ajax_link"> a </a>

<br><br>
<form action="/create_batch" id="createbatchid" onsubmit="return post_request(this)">
    @csrf
    {{-- <input type="hidden" name="email" value="{{ $user->email }}"> --}}

    <div class="row p-2 justify-content-center">

        <div class="col-md-3">
            <label for="class_no">CLASS NO.</label><br>
            <span class="form-control font-weight-bold">{{ @$batchcount }}</span>
            {{-- <input id="class_no" type="text" style="text-transform: capitalize"
                class="form-control" placeholder="" value="{{ @$batchcount }}" readonly> --}}
        </div>

        <div class="col-md-6">
            <div class="">
                <label for="batch_name">CLASS NAME</label>
                <input id="batch_name" name="batch_name" type="text"
                    style="text-transform: capitalize"
                    class="form-control @error('batch_name') is-invalid @enderror"
                    placeholder="Class Name">
            </div>
            @error('batch_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="col-md-3">
            <div class="">
                <label for="batch_limit">CLASS LIMIT</label>
                <input id="batch_limit" type="text" style="text-transform: capitalize"
                    class="form-control @error('batch_limit') is-invalid @enderror"
                    placeholder="Set Limit" value="">
            </div>
            @error('batch_limit')

                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>

            @enderror
        </div>


        <div class="col-md-12 table-responsive mt-3">

            <table id="createbatchtable"
                class="table table-condensed table-bordered text-center p-0">

                <thead>
                    <th class="col-md-2">Sno</th>
                    <th class="col-md-5">Student Name</th>
                    <th class="col-md-5">Email/Enrollment</th>
                </thead>
                <tbody id="batchdetails">
                    <tr>
                        <td class="p-0 col-md-2">
                            <button class="btn btn-sm" type="button"
                                onclick="deleteRow(this)"><i class="fa fa-window-close"
                                    aria-hidden="true"></i>1</button>
                        </td>

                        <td class="p-0 col-md-5">
                            <input name="name[]" type="text" style="text-transform: capitalize"
                                class="form-control" placeholder="Name" />
                        </td>

                        <td class="p-0 col-md-5">
                            <input name="enrollment[]" type="text"
                                style="text-transform: capitalize" class="form-control Amount"
                                placeholder="Email / Enrollment" onkeydown="NewRow()" />
                        </td>


                    </tr>
                </tbody>
                <caption>
                    <button type="button" onclick="insRow()" class=" btn-sm btn-success"><i
                            class="fa fa-diamond" aria-hidden="true"></i> Add (+)</button>
                </caption>
            </table>

        </div>
        <br>
        <div class="text-center">
            <button type="submit" class="btn btn-primary m-2 mb-3"
                id="btnSubmit">Submit</button>
            <button type="button" class="btn btn-warning m-2 mb-3"
                id="btnDetails">Details</button>
            <button type="button" class="btn btn-danger m-2 mb-3" id="btnClose">Close</button>
        </div>
    </div>
</form>
