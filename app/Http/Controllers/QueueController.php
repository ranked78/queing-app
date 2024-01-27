<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Queue;
use Illuminate\Support\Facades\Auth;

class QueueController extends Controller
{


    public function index()
    {
        $queues = Queue::orderBy('id', 'desc')->paginate(5);

        return view('queue_list', compact('queues'));
    }
    public function show($id)
    {
        // Retrieve the queue by ID
        $queue = Queue::findOrFail($id);

        // Pass the queue to the view
        return view('queues.show', ['queue' => $queue]);
    }
    public function create()
    {
        return view('queues.create');
    }

    public function store(Request $request)
    {
        // Validate the request...

        // Create a new queue instance and save it
        $queue = new Queue();
        $queue->name = $request->input('name');
        $queue->type_of_transaction = $request->input('type_of_transaction');
        $queue->save();

        // Redirect to a route that displays the queue ID
        return redirect()->route('queue.show', ['id' => $queue->id]);
    }

    public function deleteAll()
    {
        Queue::truncate();
        return redirect()->route('dashboard')->with('success', 'All queues deleted successfully!');
    }


    public function updateStatus()
    {

        $user = Auth::user();
        // Find the oldest record with the 'Queueing' status
        $oldestQueue = Queue::where('status', 'Queueing')
            ->whereNull('registrar')
            ->orderBy('id')
            ->first();




        if ($oldestQueue) {

            // Update the status to 'In Progress'
            $oldestQueue->update([
                'status' => 'In Progress',
                'registrar' => $user->role_id,
            ]);

            // Format the success message
            $successMessage = "Queue status updated successfully.<br>
             You are now serving: <br>
        <span style='margin-right: 10px;'>ID:</span> $oldestQueue->id <br>
        <span style='margin-right: 10px;'>Name:</span> $oldestQueue->name <br>
        <span style='margin-right: 10px;'>Type of Transaction:</span> $oldestQueue->type_of_transaction";


            return redirect()->back()->with('success', $successMessage);

        } else {
            return redirect()->back()->with('error', 'No record in "Queueing" status found.');
        }
    }

    public function markAsDone()
    {
        $user = Auth::user();
        // Find the oldest record with the 'Queueing' status
        $oldestQueue = Queue::where('status', 'In Progress')
            ->where('registrar', $user->role_id)
            ->orderBy('id')
            ->first();

        if ($oldestQueue) {

            // Update the status to 'In Progress'
            $oldestQueue->update([
                'status' => 'Done'
            ]);

            // Format the success message
            $successMessage = "Queue status updated successfully";


            return redirect()->back()->with('success', $successMessage);

        } else {
            return redirect()->back()->with('error', 'No record "In Progress" status found.');
        }
    }

}
