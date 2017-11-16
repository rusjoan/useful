# PHP worker signals example

This sample project shows up how to handle external system signals.
Useful when script acts like long-running worker that should be stopped only when it finishes current job.

Run it like `php worker.php > log.log &` and take the printed PID from terminal.
`tail -f log.log` and then run `kill -15 <PID>`. Process will not be stopped immediately — it will only after timer finishes.

Note about `time_sleep_until()` function: it used because it not interrupted by external signals unlike `sleep()` do.
