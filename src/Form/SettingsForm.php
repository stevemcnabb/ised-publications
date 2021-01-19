<?php

namespace Drupal\ised_publications\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure ISED Publications settings for this site.
 */
class SettingsForm extends ConfigFormBase {

  /**
  * {@inheritdoc}
  */
  public function getFormId() {
    return 'ised_publications_settings';
  }

    /**
     * {@inheritdoc}
     */
    protected function getEditableConfigNames() {
      return ['ised_publications.settings'];
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state) {
      $form['form_1_email_notice_recipients'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Form 1 Email Notice Recipients'),
        '#default_value' => $this->config('ised_publications.settings')
          ->get('form_1_email_notice_recipients'),
        '#description' => $this->t('Email addresses separated by commas who should receive notifications when new publications are submitted')
      ];
      return parent::buildForm($form, $form_state);
    }

    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state) {
      if ($form_state->getValue('form_1_email_notice_recipients') == '') {
        $form_state->setErrorByName('form_1_email_notice_recipients', $this->t('You must submit at least one email address'));
      }
      parent::validateForm($form, $form_state);
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {
      $this->config('ised_publications.settings')
        ->set('form_1_email_notice_recipients', $form_state->getValue('form_1_email_notice_recipients'))
        ->save();
      parent::submitForm($form, $form_state);
    }

}
