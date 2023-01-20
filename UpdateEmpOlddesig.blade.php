<!DOCTYPE html>
@extends('layouts.mainlayout')
@section('title', 'Update Employee Old Designation')
@section('content')
<div class="container">
    <div class="row">
        <div class="container" id="faccontainer">
            <h1> Employee Old Designation Details</h1>
            <div class="row text-left">
                <div class="col-md-12">
                    <form action="{{ url('/EmpOlddesigUpdate') }}" method="POST" class="was-validated">
                        {{ csrf_field() }}
                        </br></br>
                        <div class="form-group form-row">
                            <label class="col-sm-3" for="input-title">ID</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ $empOlddesig->id }}" class="form-control" id="upid" name="upid" readonly>
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <label class="col-sm-3" for="input-title">UPF No</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ $empOlddesig->upfno }}" class="form-control" id="upupfno" name="upupfno"  readonly>
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <label class="col-sm-3" for="input-title">Employee Old Designation</label>
                            <div class="col-sm-9 text-left">
                                <!-- <input type="text" value="{{ $empOlddesig->old_designation }}" class="form-control" id="olddesig" name="olddesig" placeholder="Enter the Employee Old Designation here"> -->
                                <select class="form-control formselect required" placeholder="Select Designation" id="olddesig" name="olddesig">
                                    @foreach($designation as $desig)
                                    <option value="{{$desig->id}}" {{$desig->id == $empOlddesig->old_designation? 'selected'  :''}}>
                                        {{ ucfirst($desig->designation) }}
                                    </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="form-group form-row">
                            <label class="col-sm-3" for="input-grade">Grade</label>
                            <div class="col-sm-9">
                        <!-- <select class="form-control formselect required" placeholder="Select Grade" id="gradeSelect" name="gradeSelect" required="required"> -->
                        <select class="form-control formselect required" placeholder="Select Grade" id="gradeSelect" name="gradeSelect" required="required">
                        <option value="" disabled selected>Select Grade</option>
                            @foreach($empGrade as $grade)
                            <option value="{{$grade->id}}" {{ $empOlddesig->grade == $grade->id ? 'selected' : '' }}>
                                {{ ucfirst($grade->grade) }}
                            </option>
                            @endforeach
                                </select>

                        <!-- </select> -->
                    </div>
                        </div>
                        <div class="form-group form-row">
                    <label class="col-sm-3" for="input-startdate">Start Date</label>
                    <div class="col-sm-9">
                        <input  class="form-control" type="date"  name="startdate" placeholder="default" value="{{ $empOlddesig->Start_Date }}" required="required" id="input-startdate">
                    </div>
                    </div>
                    <div class="form-group form-row">
                    <label class="col-sm-3" for="input-enddate">End Date</label>
                    <div class="col-sm-9">
                        <input  class="form-control" type="date" name="enddate" placeholder="default" value="{{ $empOlddesig->End_Date }}" required="required" id="input-enddate"
                            onchange="onDateChange(event);">
                    </div>
</div>
                    <div class="form-group form-row">
                            <label class="col-sm-3" for="input-duration">Duration</label>
                            <div class="col-sm-9 text-left">
                                <input type="text" class="form-control" id="duration" name="duration" placeholder="Enter the Duration here" value="{{ $empOlddesig->Duration }}" readonly>
                            </div>
                        </div>
                        </br>
                        <button type="submit" class="btn btn-primary"  onclick="return confirm('Are you sure?')" >Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function diff_year_month_day(dt1, dt2) {
 
      var time =(dt2.getTime() - dt1.getTime()) / 1000;
      var month = Math.abs(Math.round(time/(60 * 60 * 24 * 7 * 4)));
      years = Math.floor(month/12);
      months = month%12;
      date = month%31;
      return  years + " Years " + months + " Months " + date + " Date" ;
       
     }

    function onDateChange(e){
       
        let startDate = new Date(  $("[name='startdate'").val() );
        let endDate = new Date( $("[name='enddate'").val() );
        let dateDiff = diff_year_month_day(endDate, startDate);
        $("[name='duration']").val(dateDiff);
    }
</script>
@endsection