<html>

<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>

    .UpdateInputs
    {
        background-color: white !important;
        border: 0px solid white;
    }

    .UpdateInputsTot
    {
        background-color: white !important;
        border: 0px solid white;
    }

    .InputStatus
    {
        color: red;
        font-size: 12px;
    }

    </style>

</head>

<body>

<div class="container"> <!-- Start Of The Container Class -->
    <div class="row text-center"> <!-- Start Of The Row Class -->

        <div class="col-md-12 col-sm-12 hero-feature"> <!-- Start Of The Col Class -->

            <h3>Welcome</h3>

<form action="" name="JsonForm" id="JsonForm">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="ProductName">Product name</label> 
        <input type="text" class="form-control ProductName" name="ProductName" required>
    </div>
    <div class="form-group">
        <label for="Quantity">Quantity in stock</label> <span class="InputStatus QuantityStatus"></span>
        <input type="text" class="form-control Quantity" name="Quantity" required>
    </div>
    <div class="form-group">
        <label for="PricePerItem">Price per item</label> <span class="InputStatus PricePerItemStatus"></span>
        <input type="text" class="form-control PricePerItem" name="PricePerItem" required>
    </div>
    <button type="button" class="btn btn-primary FormSubmit">Submit</button>

</form>

<table class="table" id="tblData">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Product name</th>
        <th scope="col">Quantity in stock</th>
        <th scope="col">Price per item</th>
        <th scope="col">Date Time Created</th>
        <th scope="col">Total value number</th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody class="TblBody">
    @foreach($AllTheData as $result)
        <tr>
            <form action="" name="UpdateForm" class="UpdateForm">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$result->id}}" class="form-control id UpdateInputs UpT">
                <td><input type="text" name="ProductNameWithVal" value="{{$result->product_name}}" class="form-control ProductNameWithVal UpdateInputs UpT" disabled></td>
                <td><input type="text" name="QuantityWithVal" value="{{$result->quantity_in_stock}}" class="form-control QuantityWithVal UpdateInputs UpT" disabled></td>
                <td><input type="text" name="PricePerItemWithVal" value="{{$result->price_per_item}}" class="form-control PricePerItemWithVal UpdateInputs UpT" disabled></td>
                <td>{{$result->created_at}}</td>
                <td><input type="text" name="TotalValueNumberWithVal" value="{{$result->total_value_number}}" class="form-control TotalValueNumberWithVal UpdateInputsTot" disabled></td>
                <td><button type="button" class="btn btn-success EditBtn">Edit</button></td>
                <td><button type="button" class="btn btn-info SaveBtn">Save</button></td>
                <td><button type="button" class="btn btn-danger DeleteBtn">Delete</button></td>
                <td><button type="button" class="btn btn-danger CancelBtn">Cancel</button></td>
            </form>
        </tr>
    @endforeach
    <tr>
            <form action="" name="UpdateForm" class="UpdateForm">
                {{ csrf_field() }}
                <input type="hidden" name="id" class="form-control id UpdateInputs UpT">
                <td><input type="text" name="ProductNameWithVal" id="ProductNameWithVal" class="form-control ProductNameWithVal UpdateInputs UpT" disabled></td>
                <td><input type="text" name="QuantityWithVal" id="QuantityWithVal" class="form-control QuantityWithVal UpdateInputs UpT" disabled></td>
                <td><input type="text" name="PricePerItemWithVal" id="PricePerItemWithVal" class="form-control PricePerItemWithVal UpdateInputs UpT" disabled></td>
                <td></td>
                <td><input type="text" name="TotalValueNumberWithVal" id="TotalValueNumberWithVal" class="form-control TotalValueNumberWithVal UpdateInputsTot" disabled></td>
                <td><button type="button" class="btn btn-success EditBtn HideBtns EBt">Edit</button></td>
                <td><button type="button" class="btn btn-info HideBtns SaveBtn SBt">Save</button></td>
                <td><button type="button" class="btn btn-danger DeleteBtn HideBtns DBt">Delete</button></td>
                <td><button type="button" class="btn btn-danger CancelBtn HideBtns">Cancel</button></td>
            </form>
        </tr>
    </tbody>
</table>

        </div>
    </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">

    $(document).ready(function () {

        $(".HideBtns").hide();

        $(".FormSubmit").click(function(){

            var CheckProductName = $(".ProductName").val();
            var CheckQuantity = $(".Quantity").val();
            var CheckPricePerItem = $(".PricePerItem").val();
            if(CheckProductName == "")
            {
                alert("Please fill Product name");
            }
            else if(CheckQuantity == "")
            {
                alert("Please fill Quantity");
            }
            else if(CheckPricePerItem == "")
            {
                alert("Please fill Price Per Item");
            }
            else if ($(".Quantity").val().match(/[a-z]/i))
            {
                $(".QuantityStatus").html("| You cant enter letters, only numbers");
            }
            else if ($(".PricePerItem").val().match(/[a-z]/i))
            {
                $(".PricePerItemStatus").html("| You cant enter letters, only numbers");
            }
            else {
                var FormSerialized = $("#JsonForm").serialize();
                $.ajax({
                    url: "{{route('GetFormData')}}",
                    data: FormSerialized,
                    method: 'POST',
                    success: function (data) {
                        //console.log(data.PricePerItem);

                        $("#ProductNameWithVal").val(data.ProductName);
                        $("#QuantityWithVal").val(data.Quantity);
                        $("#PricePerItemWithVal").val(data.PricePerItem);
                        $("#TotalValueNumberWithVal").val(data.TotalValueNumber);

                        $(".EBt").show();
                        $(".DBt").show();

                    }
                });
            }
        });

        $(".SaveBtn").hide();
        $(".CancelBtn").hide();

        $(".EditBtn").click(function(){
            $(this).closest("tr").find(".UpdateInputs").prop('disabled',false);
            $(this).closest("tr").find(".EditBtn").hide();
            $(this).closest("tr").find(".SaveBtn").show();
        });

        var Quantity = $(".Quantity").val();
        var PricePerItem = $(".PricePerItem").val();
        $(".SaveBtn").click(function(){
            var ThisSaveBtn = $(this).closest("tr");
            var TotalValueNumber = (ThisSaveBtn.find(".QuantityWithVal").val() * ThisSaveBtn.find(".PricePerItemWithVal").val());
            var UpdateFormSerialized = $(this).closest("tr").find(".UpdateForm").serialize();
            $.ajax({
                url: "{{route('UpdateData')}}",
                data: UpdateFormSerialized,
                method: 'POST',
                success: function (data) {
                    ThisSaveBtn.find(".UpdateInputs").prop('disabled',true);
                    ThisSaveBtn.find(".EditBtn").show();
                    ThisSaveBtn.find(".SaveBtn").hide();
                    ThisSaveBtn.find(".CancelBtn").hide();
                    ThisSaveBtn.find(".DeleteBtn").show();
                    ThisSaveBtn.find(".UpT").addClass("UpdateInputs");
                    ThisSaveBtn.find(".TotalValueNumberWithVal").val(TotalValueNumber);
                }
            });
        });

        $(".DeleteBtn").click(function(){
            var ThisSaveBtn = $(this).closest("tr");
            $.ajax({
                url: "{{route('DeleteData')}}",
                data: {
                    id: $(this).closest("tr").find(".id").val(),
                    _token: '{{csrf_token()}}'
                },
                method: 'POST',
                success: function (data) {
                    ThisSaveBtn.remove();
                }
            });
        });

        $(".SBt").click(function(){
            location.reload();
        });

        $(".EditBtn").click(function(){
            $(this).closest("tr").find(".UpdateInputs").removeClass("UpdateInputs");
            $(this).closest("tr").find(".DeleteBtn").hide();
            $(this).closest("tr").find(".CancelBtn").show();
        });

        $(".CancelBtn").click(function(){
            $(this).closest("tr").find(".UpT").addClass("UpdateInputs");
            $(this).closest("tr").find(".DeleteBtn").show();
            $(this).closest("tr").find(".EditBtn").show();
            $(this).closest("tr").find(".CancelBtn").hide();
            $(this).closest("tr").find(".SaveBtn").hide();
        });

        $(".Quantity").keyup(function(){
            if ($(".Quantity").val().match(/[a-z]/i))
                {
                    $(".QuantityStatus").html("| You cant enter letters, only numbers");
                }
                else
                {
                    $(".QuantityStatus").empty();
                }
        });

        $(".PricePerItem").keyup(function(){
            if ($(".PricePerItem").val().match(/[a-z]/i))
                {
                    $(".PricePerItemStatus").html("| You cant enter letters, only numbers");
                }
                else
                {
                    $(".PricePerItemStatus").empty();
                }
        });

    });
</script>

</body>
</html>