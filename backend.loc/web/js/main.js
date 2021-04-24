const filter = (order = {}) => {
    const form = document.getElementById('filter');

    const fields = [
        'firstName', 'lastName', 'email',
        'phone', 'message', 'assigned'
    ];

    for (let i = 0; i < fields.length; i++)
    {
        form.appendChild(createHiddenInput(
            fields[i],
            document.getElementById(fields[i]).value
        ));
    }

    if (JSON.stringify(order) != '{}')
    {
        form.appendChild(createHiddenInput(
            'order_column',
            order.column
        ));

        form.appendChild(createHiddenInput(
            'order_type',
            order.type
        ));
    }

    form.submit();
}

const createHiddenInput = (name, value) => {
    const input = document.createElement('input');

    input.setAttribute('type', 'hidden');
    input.setAttribute('name', name);
    input.setAttribute('value', value);

    return input;
}
