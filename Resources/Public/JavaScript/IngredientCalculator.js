const foodRecipesIngredientCalculator = {
  init: function() {
    this.calculator = document.querySelector('.recipe-ingredients-calculator');

    if (!this.calculator) {
      console.error('Could not find ingredient calculator with select: .recipe-ingredients-calculator');
    }

    this.recipeIngredientsContainer = this.calculator.closest('.recipe-ingredients');
    this.baseServings = this.calculator.querySelector('.form-recipe-servings').value;

    this.calculator.querySelector('.form-recipe-servings').addEventListener('change', (event) => {
      this.recipeIngredientsContainer.querySelectorAll('.recipe-ingredient-value').forEach((element) => {
        let baseFactor = element.getAttribute('data-value') / this.baseServings;
        element.textContent = event.target.value * baseFactor;
      });
    });
  }
};

document.addEventListener('DOMContentLoaded', () => {
  foodRecipesIngredientCalculator.init();
});
