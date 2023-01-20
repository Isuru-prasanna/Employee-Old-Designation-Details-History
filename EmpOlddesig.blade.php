<!DOCTYPE html>
@extends('layouts.mainlayout')
@section('title', 'Employee Old Designations')
@section('content')
<div class="container">
    <div class="row">
        <div class="container" id="faccontainer">
            <h1> Employee Old Designation Details</h1>
            <div class="row">
                <div class="col-md-12">
                    <form action="{{url('/EmpOlddesigSave')}}" method="POST" class="was-validated">
                        {{ csrf_field() }}
                        </br></br>
                        <div class="form-group form-row">
                            <label class="col-sm-3" for="input-upf">UPF No</label>
                            <div class="col-sm-9 text-left">
                                <input type="text" class="form-control" id="upfno" name="upfno" placeholder="Enter the UPF No here" value="{{ $employee->empUPFNo }}" readonly>
                                <input class="form-control" type="number" name="id" id="id" value="{{$employee->empUPFNo}}" hidden>

                            </div>
                        </div>
                        <div class="form-group form-row">
                            <label class="col-sm-3" for="input-title">Employee Old Designation</label>
                            <div class="col-sm-9 text-left">
                                <!-- <input type="text" class="form-control" id="olddesig" name="olddesig" placeholder="Enter the Employee Old Designation here"> -->
                                <select class="form-control formselect " placeholder="Select Old Designation here" id="olddesig" name="olddesig" required="required">
                                    <option value="" disabled selected>Select Designation</option>
                                    @foreach($designation as $desigs)
                                    <option value="{{$desigs->id}}">
                                        {{ ucfirst($desigs->designation) }}
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
                                    <option value="{{$grade->id}}">
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
                                <input value="" class="form-control" type="date" name="startdate" placeholder="default" required="required" id="input-startdate" onchange="onDateChange(event);">
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <label class="col-sm-3" for="input-enddate">End Date</label>
                            <div class="col-sm-9">
                                <input value="" class="form-control" type="date" name="enddate" placeholder="default" required="required" id="input-enddate" onchange="onDateChange(event);">
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <label class="col-sm-3" for="input-duration">Duration</label>
                            <div class="col-sm-9 text-left">
                                    <input type="text" class="form-control" id="duration" name="duration" placeholder="Duration" required="required" readonly>
                            </div>
                        </div>
                        </br>
                        <input type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?')" value="SAVE">
                        <input type="button" class="btn btn-warning" value="CLEAR">
                        </br>
                    </form>
                    <br>
                    <table class="table table-dark" style="width:100%;">


                        <th>UPF No</th>
                        <th>Employee Old Designation</th>
                        <th>Grade</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Duration</th>

                        <td>Action</td>
                        @foreach ($empOlddesig as $empOlddesig_n)
                        <tr>

                            <td> {{ $empOlddesig_n->upfno }} </td>
                            <td> {{ $empOlddesig_n->designation }} </td>
                            <td> {{ $empOlddesig_n->grade }} </td>
                            <td> {{ $empOlddesig_n->Start_Date }} </td>
                            <td> {{ $empOlddesig_n->End_Date }} </td>
                            <td> {{ $empOlddesig_n->Duration }} </td>

                            <td>
                                {{csrf_field()}}

                                <a href="{{ url('/EmpOlddesigDelete/'.$empOlddesig_n->id ) }}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                <a href="{{ url('/EmpOlddesigUpdateView/'.$empOlddesig_n->id) }}" class="btn btn-warning" onclick="return confirm('Are you sure?')">Update</a>
                            </td>
                        </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function diff_year_month_day(dt1, dt2) {

        var time = (dt2.getTime() - dt1.getTime()) / 1000;
        var month = Math.abs(Math.round(time / (60 * 60 * 24 * 7 * 4)));
        years = Math.floor(month / 12);
        months = month % 12;
        date = month % 31;
        return years + " Years " + months + " Months " + date + " Date";

    }

    function onDateChange(e) {

        let startDate = new Date($("[name='startdate'").val());
        let endDate = new Date($("[name='enddate'").val());
        let dateDiff = diff_year_month_day(endDate, startDate);
        $("[name='duration']").val(dateDiff);
    }
</script>
@endsection