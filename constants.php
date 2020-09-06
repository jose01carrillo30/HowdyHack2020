<?php
// Usage: Status::REQUESTED
abstract class Status
{
    const REQUESTED = 1,
    const INPROGRESS = 2,
    const COMPLETED = 3,
    const PUBLISHED = 4
    const FROMNUM = array(
        "foo" => "bar",
        "bar" => "foo",
    );
}
?>