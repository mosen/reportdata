<?php


namespace Munkireport\ReportData;


use Illuminate\Http\Request;

class ApiController
{
    public function index()
    {
        $reportData = ReportData::all();

        return new ReportDataResource($reportData);
    }

    public function store(Request $request)
    {
        if (!$request->json('data')) {
            return abort(400);
        }

        $reportDatum = new ReportData;
        // NOTE: in some cases this is highly dangerous eg. when password fields are involved.
        $reportDatum->fill($request->json('data'));

        return new ReportDatumResource($machineGroup);
    }

    public function show(ReportData $reportDatum)
    {
        return new ReportDatumResource($reportDatum);
    }

    public function update(Request $request, ReportData $reportDatum)
    {
        if (!$request->json('data')) {
            return abort(400);
        }

        $reportDatum->update($request->json('data'));

        return new ReportDatumResource($reportDatum);
    }

    public function destroy(ReportData $reportDatum)
    {
        $reportDatum->delete();
        return abort(204);
    }
}
