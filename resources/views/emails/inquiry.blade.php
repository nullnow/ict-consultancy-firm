<div style="font-family: sans-serif; line-height: 1.6; color: #333;">

  <h2 style="border-bottom: 2px solid #eee; padding-bottom: 10px;">New Enquiry</h2>

  <p><strong>Full Name:</strong> {{ $info->full_name }}</p>

  <p><strong>Email:</strong> {{ $info->email }}</p>

  <p><strong>Company Name:</strong> {{ $info->company_name }}</p>

  <p><strong>Phone Number:</strong> {{ $info->phone_number }}</p>

  @if ($info->fleet_size)
    <p><strong>Fleet Size:</strong> {{ $info->fleet_size }}</p>
  @endif

  <div style="background: #f9f9f9; padding: 15px; border-radius: 5px; margin-top: 20px;">

    <span><strong>Service Interested In:</strong> {{ $info->service_interested_in }}</span>

  </div>

  @if($info->message)
    <div style="background: #f9f9f9; padding: 15px; border-radius: 5px; margin-top: 20px;">

    <strong>Message:</strong><br/>

      {!! nl2br(e($info->message)) !!}

    </div>
  @endif

  </div>

</div>
