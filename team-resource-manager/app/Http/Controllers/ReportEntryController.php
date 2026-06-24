<?php

namespace App\Http\Controllers;

use App\Models\ReportEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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
            'week_number' => [
                'required', 'integer', 'min:1', 'max:53',
                Rule::unique('report_entries')->where(fn ($query) => $query
                    ->where('user_id', Auth::id())
                    ->where('year', $request->integer('year'))
                ),
            ],
            'year'        => 'required|integer|min:2000|max:2100',
            'title'       => 'required|string|max:255',
            'content'     => 'required|string',
            'status'      => 'required|string|in:Entwurf,Eingereicht,Freigegeben',
        ], [
            'week_number.unique' => 'Für diese Kalenderwoche und dieses Jahr existiert bereits ein Eintrag.',
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
            'week_number' => [
                'required', 'integer', 'min:1', 'max:53',
                Rule::unique('report_entries')->ignore($reportEntry->id)->where(fn ($query) => $query
                    ->where('user_id', Auth::id())
                    ->where('year', $request->integer('year'))
                ),
            ],
            'year'        => 'required|integer|min:2000|max:2100',
            'title'       => 'required|string|max:255',
            'content'     => 'required|string',
            'status'      => 'required|string|in:Entwurf,Eingereicht,Freigegeben',
        ], [
            'week_number.unique' => 'Für diese Kalenderwoche und dieses Jahr existiert bereits ein Eintrag.',
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