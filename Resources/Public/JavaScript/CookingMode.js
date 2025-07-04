const cookingMode = {
  init: function() {
    this.togglers = document.querySelectorAll('.cookingModeToggler');

    if (!this.togglers) {
      console.error('Could not find cooking mode togglers with select: .cookingModeToggler');
    }

    this.togglers.forEach((toggler) => {
      toggler.addEventListener('click', (event) => {
        event.preventDefault();

        if (!document.querySelector('body').classList.contains('cooking-mode')) {
          this.start();
        } else {
          this.end();
        }
      });
    });

    this.steps = document.querySelector('.list-recipe-steps');

    if (!this.steps) {
      console.error('Could not find recipe steps with select: .list-recipe-steps');
      return;
    }

    this.prevButtons = this.steps.querySelectorAll('.list-group-item .recipe-steps-cooking-mode-prev');
    this.nextButtons = this.steps.querySelectorAll('.list-group-item .recipe-steps-cooking-mode-next');

    if (!this.prevButtons || !this.nextButtons) {
      console.error('Could not find recipe steps controls with selectors: .list-group-item .recipe-steps-cooking-mode-prev .list-group-item .recipe-steps-cooking-mode-next');
    }

    this.prevButtons.forEach((button) => {
      button.addEventListener('click', (event) => {
        event.preventDefault();
        let prev = parseInt(event.target.getAttribute('data-iteration')) - 1;

        if (prev < 1 || prev == 'NaN') {
          prev = 1;
        }

        this.goToStep(prev-1);
      });
    });

    this.nextButtons.forEach((button) => {
      button.addEventListener('click', (event) => {
        event.preventDefault();
        let next = parseInt(event.target.getAttribute('data-iteration')) + 1;
        let maxSteps = parseInt(this.steps.getAttribute('data-max-steps'));

        if (next >= maxSteps || next == 'NaN') {
          next = maxSteps;
        }

        this.goToStep(next-1);
      });
    });
  },
  start: function() {
    this.steps.querySelector('.list-group-item:first-child').classList.add('active');
    document.querySelector('body').classList.add('cooking-mode');
    this.requestWakeLock();
  },
  end: function() {
    document.querySelector('body').classList.remove('cooking-mode');
    this.releaseWakeLock();
  },
  goToStep: function(targetIndex) {
    this.steps.querySelectorAll('.list-group-item.active').forEach((element) => {
      element.classList.remove('active');
    });

    this.steps.querySelectorAll('.list-group-item').forEach((element, index) => {
      if (index == targetIndex) {
        element.classList.add('active');
      }
    });
  },
  requestWakeLock: async function() {
    if ('wakeLock' in navigator) {
      try {
        this.wakeLock = await navigator.wakeLock.request('screen');
        console.log('Wake Lock is active');
      } catch (err) {
        console.error(`${err.name}, ${err.message}`);
      }
    } else {
      console.warn('Wake Lock API is not supported in this browser.');
    }
  },
  releaseWakeLock: async function() {
    if (this.wakeLock) {
      try {
        await this.wakeLock.release();
        console.log('Wake Lock has been released');
      } catch (err) {
        console.error(`${err.name}, ${err.message}`);
      }
      this.wakeLock = null;
    }
  }
};

document.addEventListener('DOMContentLoaded', () => {
  cookingMode.init();
});
