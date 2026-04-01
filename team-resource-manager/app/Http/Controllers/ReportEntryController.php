<?php

namespace App\Http\Controllers;

use App\Models\ReportEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportEntryController extends Controller
{
    public function index()
    {
        $entries = ReportEntry::where('user_id', Auth::id())
            ->orderByDesc('year')
            ->orderByDesc('week_number')
            ->get();

        return view('report_entries.index', compact('entries'));
    }

    public function create()
    {
        return view('report_entries.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'week_number' => 'required|integer|min:1|max:53',
            'year'        => 'required|integer|min:2000|max:2100',
            'title'       => 'required|string|max:255',
            'content'     => 'required|string',
            'status'      => 'required|string|in:Entwurf,Eingereicht,Freigegeben',
        ]);

        $data['user_id'] = Auth::id();

        ReportEntry::create($data);

        return redirect()
            ->route('report-entries.index')
            ->with('success', 'Berichtsheft-Eintrag wurde erstellt.');
    }

    public function show(ReportEntry $reportEntry)
    {
        if ($reportEntry->user_id !== Auth::id()) {
            abort(403);
        }

        return view('report_entries.show', [
            'entry' => $reportEntry
        ]);
    }

    public function edit(ReportEntry $reportEntry)
    {
        if ($reportEntry->user_id !== Auth::id()) {
            abort(403);
        }

        return view('report_entries.edit', [
            'entry' => $reportEntry
        ]);
    }

    public function update(Request $request, ReportEntry $reportEntry)
    {
        if ($reportEntry->user_id !== Auth::id()) {
            abort(403);
        }

        $data = $request->validate([
            'week_number' => 'required|integer|min:1|max:53',
            'year'        => 'required|integer|min:2000|max:2100',
            'title'       => 'required|string|max:255',
            'content'     => 'required|string',
            'status'      => 'required|string|in:Entwurf,Eingereicht,Freigegeben',
        ]);

        $reportEntry->update($data);

        return redirect()
            ->route('report-entries.index')
            ->with('success', 'Berichtsheft-Eintrag wurde aktualisiert.');
    }

    public function destroy(ReportEntry $reportEntry)
    {
        if ($reportEntry->user_id !== Auth::id()) {
            abort(403);
        }

        $reportEntry->delete();

        return redirect()
            ->route('report-entries.index')
            ->with('success', 'Berichtsheft-Eintrag wurde gelöscht.');
    }
}