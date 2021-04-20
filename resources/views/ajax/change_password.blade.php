<form action="/dashboard/change_password" onsubmit="return change_password(this)">
    @csrf
    <input type="text" name="password1" value="123456">
    <input type="text" name="password2" value="123456">
    <button type="submit"> Change Pass</button>

</form>

{{ @$pass }}


<script>
    function change_password(element) {

        const inputs = $(element).find(':input');
        const csrf = inputs[0].value;
        const password1 = inputs[1].value;
        const password2 = inputs[2].value;
        // console.log(csrf);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.post("dashboard/change_password", {
                p1: password1,
                p2: password2,
                csrf: csrf
            },
            function(data, status) {
                alert("Data: " + data + "\nStatus: " + status);
            });

        return false;
    }

</script>
