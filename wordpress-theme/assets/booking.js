document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('booking-form');
  if (!form) return;

  const roomSelect = document.getElementById('booking-room');
  const checkInInput = document.getElementById('booking-checkin');
  const checkOutInput = document.getElementById('booking-checkout');
  const feedback = document.getElementById('booking-feedback');
  const submitBtn = form.querySelector('button[type="submit"]');

  const today = new Date().toISOString().split('T')[0];
  if (checkInInput) checkInInput.min = today;
  if (checkOutInput) checkOutInput.min = today;

  document.querySelectorAll('[data-room]').forEach(link => {
    link.addEventListener('click', () => {
      const room = link.getAttribute('data-room');
      if (room && roomSelect) {
        roomSelect.value = room;
      }
    });
  });

  const showFeedback = (message, isError) => {
    feedback.textContent = message;
    feedback.classList.remove('hidden', 'text-red-600', 'text-green-600');
    feedback.classList.add(isError ? 'text-red-600' : 'text-green-600');
  };

  form.addEventListener('submit', async (e) => {
    e.preventDefault();

    if (checkInInput.value && checkOutInput.value && checkOutInput.value <= checkInInput.value) {
      showFeedback('Дата выезда должна быть позже даты заезда.', true);
      return;
    }

    const formData = new FormData(form);
    formData.append('action', 'monarch_booking_submit');
    formData.append('nonce', monarchBooking.nonce);

    submitBtn.disabled = true;
    submitBtn.classList.add('opacity-60');

    try {
      const response = await fetch(monarchBooking.ajaxUrl, {
        method: 'POST',
        body: formData,
      });
      const data = await response.json();

      if (data.success) {
        showFeedback(data.data.message, false);
        form.reset();
      } else {
        showFeedback((data.data && data.data.message) || 'Не удалось отправить заявку.', true);
      }
    } catch (err) {
      showFeedback('Ошибка сети. Попробуйте ещё раз.', true);
    } finally {
      submitBtn.disabled = false;
      submitBtn.classList.remove('opacity-60');
    }
  });
});
